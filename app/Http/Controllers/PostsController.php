<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Post;
use App\User;
// use DB  if you want to use your own query 
 
class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetching Data With Eloquent
        // $posts = Post::all();
        // return Post::where('title', 'Post Two')->get();
        // $posts = DB:select('select * from posts');
        // $posts = Post::orderBy('title', 'desc')->take(1)->get()
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $user = User::find($post->user_id);
        if($user->user_type == 1){
            return view('posts.create')->with('user', $user);
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
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
            //Handle File Upload
            if($request->hasFile('cover_image')){
                // Get filename with the extension
                $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just EXT
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }

        // Create Post

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        
        //redirect

        return redirect('/dashboard/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
        return view('posts.show')->with('post', $post);
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
        $post =  Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        $data = array(
            'post' => $post,
            'user'=> $user
        );
        return view('posts.edit')->with('data', $data);
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
        if(auth()->user()->user_type == 1){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
            //Handle File Upload
            if($request->hasFile('cover_image')){
                // Get filename with the extension
                $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // Get just EXT
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);
            }
        // Create Post

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        
        //redirect

        return redirect('/dashboard/posts')->with('success', 'Post Updated');
        }else{
            return redirect('/dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('/soccer/public/storage/cover_image/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/dashboard/posts')->with('success', 'Post Removed');
    }
}
