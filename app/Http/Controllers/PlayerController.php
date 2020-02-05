<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Team;
use App\Player;
class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 0)
    {
        if($id > 0){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $allplayers = Player::all();
            $players = [];
            foreach($allplayers as $player){
                $teams = explode(',', $player->team_id);
                foreach($teams as $team){
                    if($id == $team){
                        $players[] = $player; 
                    }
                } 
            }
            $data = array(
                'user'=> $user,
                'players'=>$players
            );
            return view('dashboard.players.index')->with('data', $data);
        }
        else{
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $teams = Team::where('user_id', $user_id, 'desc')->get();
            $data = array(
                'user'=> $user,
                'teams'=> $teams
            );
            return view('dashboard.teams.index')->with('data', $data);
        }
    }
    public function existing($id){
        if($id > 0){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $players = Player::orderBy('created_at', 'desc')->paginate(10);
            $team = Team::find($id);
            $data = array(
                'user'=> $user,
                'players'=>$players,
                'flag'=>1,
                'team'=>$team
            );
            return view('dashboard.players.players')->with('data', $data); 
        }else{
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $teams = Team::where('user_id', $user_id, 'desc')->get();
            $data = array(
                'user'=> $user,
                'teams'=> $teams
            );
            return view('dashboard.teams.index')->with('data', $data);
        }
    }
    public function all(){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $players = Player::orderBy('created_at', 'desc')->paginate(10);
            $data = array(
                'user'=> $user,
                'players'=>$players,
                'flag'=>0
            );
            return view('dashboard.players.players')->with('data', $data);     
    }

    public function addexisting($team_id , $player_id){
        $player = Player::find($player_id);
        $teams = explode(',', $player->team_id);
        foreach ($teams as $team){
            if($team == $team_id){
                return redirect('dashboard/players/all/'.$team_id)->with('error', 'Player Exist On The Team');
            }
        }
        $player->team_id .= ','.$team_id;
        $player->save();
        return redirect('dashboard/players/'.$player_id)->with('success', 'Player Added To The Team');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $player = new Player;
        $player->user_id = auth()->user()->id;
        $team = Team::find($id);
        $user = User::find($player->user_id);
        if(!empty($team)){
            if($team->user_id == auth()->user()->id){
                $data = array(
                    'team'=>$team,
                    'user'=>$user
                );
                if($user->user_type == 0){
                    return view('dashboard.players.create')->with('data', $data);
                }
                else{
                    return redirect('/dashboard');
                }
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'job' => 'required',
            'team_id'=>'required',
            'player_phone_number'=> 'required',
            'player_email'=> 'required',
            'player_address'=> 'required',
            'player_pic' => 'image|nullable|max:1999'
        ]);
            //Handle File Upload
            if($request->hasFile('player_pic')){
                // Get filename with the extension
                $fileNameWithExt = $request->file('player_pic')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just EXT
                $extension = $request->file('player_pic')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('player_pic')->storeAs('public/player_pic', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }

        $team = Team::find($request->input('team_id'));
        if(!empty($team)){
            if($team->user_id == auth()->user()->id){
                $player = new Player;
                $player->name = $request->input('name');
                $player->team_id = $request->input('team_id');
                $player->job = $request->input('job');
                $player->player_phone_number = $request->input('player_phone_number');
                $player->player_email = $request->input('player_email');
                $player->player_address = $request->input('player_address');
                $player->user_id = auth()->user()->id;
                $player->player_pic = $fileNameToStore;
                $player->save();
                return redirect('/dashboard/teams')->with('success', 'Player Created');
            }else{
                return redirect('/dashboard/teams')->with('error', 'Please Check Your Team Id');
            }
        }else{
            return redirect('/dashboard/teams')->with('error', 'Please Check Your Team Id');
        }
    }
    public function deletefromteam($team_id, $player_id){
        $player = Player::find($player_id);
        $teams = explode(',', $player->team_id);
        if(count($teams) > 1){
            $teams = array_diff($teams, [$team_id]);
            $player->team_id = "";
            foreach ($teams as $team){
                $player->team_id .= $team;
                $teams = array_diff($teams, [$team]);
                if(count($teams) > 0){
                    $player->team_id .= ',';
                }else{
                    break;
                }
            }
            $player->save();
            return redirect('/dashboard/players/'.$player_id)->with('success', 'Player Removed From The Team');
        }else{
            return redirect('/dashboard/players/'.$player_id)->with('error', 'Player Must At Least Be Member One Team ');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(auth()->user()->id);
        $player = Player::find($id);
        $playerteams = explode(',', $player->team_id);
        $teams = [];
        if(!empty($player->team_id)){
            foreach($playerteams as $team){
                $teams[] = Team::find($team);
            }
            $data = array(
                'user'=> $user,
                'teams'=>$teams,
                'player'=> $player
            );
        }else{
            $data = array(
                'user'=> $user,
                'teams'=> [],
                'player'=> $player
            );
        }
            return view('dashboard.players.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find(auth()->user()->id);
        $player =  Player::find($id);
        if(auth()->user()->id !== $player->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        $data = array(
            'player' => $player,
            'user'=> $user
        );
        return view('dashboard.players.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'job' => 'required',
            'player_phone_number'=> 'required',
            'player_email'=> 'required',
            'player_address'=> 'required',
            'player_pic' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('player_pic')){
            // Get filename with the extension
            $fileNameWithExt = $request->file('player_pic')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just EXT
            $extension = $request->file('player_pic')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('player_pic')->storeAs('public/player_pic', $fileNameToStore);
        }
        $player = Player::find($id);
        $player->name = $request->input('name');
        $player->job = $request->input('job');
        $player->player_phone_number = $request->input('player_phone_number');
        $player->player_email = $request->input('player_email');
        $player->player_address = $request->input('player_address');
        $player->user_id = auth()->user()->id;
        if($request->hasFile('player_pic')){
            $player->player_pic = $fileNameToStore;
        }
        $player->save();
        $user = User::find(auth()->user()->id);
        $teams =  Team::where('id', $player->team_id)->get();
        $data = array(
            'player' => $player,
            'teams'=>$teams,
            'user'=> $user
        );
        return redirect('dashboard/players/'.$player->id)->with('success', 'Player Updated Successfully');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::find($id);

        if(auth()->user()->id !== $player->user_id){
            return redirect('dashboard/teams')->with('error', 'Unauthorized Page');
        }
        if($player->player_pic != 'noimage.jpg'){
            //Delete Image
            Storage::delete('/soccer/public/storage/player_pic/'.$player->player_pic);
        }
        $player->delete();
        return redirect('/dashboard/teams')->with('success', 'Player Removed');
    }

}
