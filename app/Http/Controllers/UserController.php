<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Team;
use App\Player;
use App\User;
class UserController extends Controller
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
        if($user->user_type == 1){
            $users = User::where('user_type', 0)->get();
            $data = array (
                'users' => $users,
                'user' => $user
            );
            return view('dashboard.users.index')->with('data', $data);
        }else{
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        if($user->user_type == 1){
            return view('dashboard.createadmin')->with('user', $user);
        }
        else{
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        if(auth()->user()->id != $id){
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        return view('dashboard.users.edit')->with('user', $user);
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
            'email' => 'required',
            'user_pic' => 'image|nullable|max:1999'
        ]);
            //Handle File Upload
            if($request->hasFile('user_pic')){
                // Get filename with the extension
                $fileNameWithExt = $request->file('user_pic')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just EXT
                $extension = $request->file('user_pic')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('user_pic')->storeAs('public/user_pic', $fileNameToStore);
            }
    
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if($request->hasFile('user_pic')){
                $user->user_pic = $fileNameToStore;
            }
            $user->save();
            return redirect('/dashboard')->with('success', 'User Info Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $teams = Team::where('user_id', $id)->get();
        $players = Player::where('user_id', $id)->get();
        if(auth()->user()->user_type == 0){
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        if(count($teams) > 0){
            foreach($teams as $team){
                if($team->team_pic != 'noimage.jpg'){
                    //Delete Image
                    Storage::delete('/soccer/public/storage/team_pic/'.$team->team_pic);
                }
                $team->delete();
            }
        }
        if(count($players) > 0){
            foreach($players as $player){
                if($player->player_pic != 'noimage.jpg'){
                    //Delete Image
                    Storage::delete('/soccer/public/storage/player_pic/'.$player->player_pic);
                }
                $player->delete();
            }
        }
        if($user->user_pic != 'noimage.jpg'){
            //Delete Image
            Storage::delete('/soccer/public/storage/user_pic/'.$user->user_pic);
        }
        $user->delete();
        return redirect('/dashboard/users')->with('success', 'User Removed');
    }
}
