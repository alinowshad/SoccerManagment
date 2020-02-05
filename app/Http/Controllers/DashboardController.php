<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Team;
use App\Player;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $users = User::where('user_type', 0)->take(8)->get();
        $allposts = Post::orderBy('title', 'desc')->take(5)->get();
        $teams = Team::where('user_id', $user_id, 'desc')->take(8)->get();
        $players = Player::where('user_id', $user_id, 'desc')->get();
        $players8 = Player::where('user_id', $user_id, 'desc')->take(5)->get();
        $data = array(
            'user'=> $user,
            'posts' => $user->posts,
            'user_type' => $user->user_type,
            'users' => $users,
            'allposts'=> $allposts,
            'teams'=> $teams,
            'players'=>$players,
            'players8'=>$players8
        );
        return view('dashboard.dashboard')->with('data', $data);
    }
    public function calendar(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('dashboard.calendar')->with('user', $user);
    }

    public function posts(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $allposts = Post::orderBy('title', 'desc')->get();
        $data = array(
            'user'=> $user,
            'allposts'=>$allposts
        );
        if($user->user_type == 1){
            return view('dashboard.posts')->with('data', $data);
        }else{
           return redirect('/dashboard');
        }
    }
}
