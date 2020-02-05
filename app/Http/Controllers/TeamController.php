<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Team;
use App\Player;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $teams = Team::where('user_id', $user_id, 'desc')->get();
        $data = array(
            'user'=> $user,
            'teams'=> $teams
        );
        return view('dashboard.teams.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = new Team;
        $team->user_id = auth()->user()->id;
        $user = User::find($team->user_id);
        if($user->user_type == 0){
            return view('dashboard.teams.create')->with('user', $user);
        }
        else{
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
            'team_gender' => 'required',
            'team_leader_name'=> 'required',
            'team_pic' => 'image|nullable|max:1999'
        ]);
            //Handle File Upload
            if($request->hasFile('team_pic')){
                // Get filename with the extension
                $fileNameWithExt = $request->file('team_pic')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just EXT
                $extension = $request->file('team_pic')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('team_pic')->storeAs('public/team_pic', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }


        $team = new Team;
        $team->name = $request->input('name');
        $team->team_gender = $request->input('team_gender');
        $team->team_leader_name = $request->input('team_leader_name');
        $team->team_leader_decription = $request->input('team_leader_decription');
        $team->user_id = auth()->user()->id;
        $team->team_pic = $fileNameToStore;
        $team->save();
        
        //redirect

        return redirect('/dashboard/teams')->with('success', 'Team Created');
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
        $team =  Team::find($id);
        $players = Player::where('team_id', $team->id)->get();
        $data = array(
            'user'=> $user,
            'team'=>$team,
            'players'=> $players
        );
        return view('dashboard.teams.show')->with('data', $data);
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
        $team =  Team::find($id);
        if(auth()->user()->id !== $team->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        $data = array(
            'team' => $team,
            'user'=> $user
        );
        return view('dashboard.teams.edit')->with('data', $data);
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
            'team_gender' => 'required',
            'team_leader_name'=> 'required',
            'team_pic' => 'image|nullable|max:1999'
        ]);
            //Handle File Upload
            if($request->hasFile('team_pic')){
                // Get filename with the extension
                $fileNameWithExt = $request->file('team_pic')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just EXT
                $extension = $request->file('team_pic')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('team_pic')->storeAs('public/team_pic', $fileNameToStore);
            }
    
            $team = Team::find($id);
            $team->name = $request->input('name');
            $team->team_gender = $request->input('team_gender');
            $team->team_leader_name = $request->input('team_leader_name');
            $team->team_leader_decription = $request->input('team_leader_decription');
            if($request->hasFile('team_pic')){
                $team->team_pic = $fileNameToStore;
            }
            $team->save();
            return redirect('/dashboard/teams')->with('success', 'Team Info Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);

        if(auth()->user()->id !== $team->user_id){
            return redirect('dashboard/teams')->with('error', 'Unauthorized Page');
        }

        if($team->team_pic != 'noimage.jpg'){
            //Delete Image
            Storage::delete('/soccer/public/storage/team_pic/'.$team->team_pic);
        }
        $players = Player::all();
        foreach($players as $player){
            $playerteams = explode(',', $player->team_id);
            $playerteams = array_diff($playerteams, [$id]);
            $player->team_id = implode(',', $playerteams);
            $player->save();
        }
        $team->delete();
        return redirect('/dashboard/teams')->with('success', 'Team Removed');
    }
}
