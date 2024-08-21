<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public function __construct() {   
        $this->middleware('auth');
    }


    public function index() {
        //fetch following user_id
        $users = auth()->user()->following()->pluck('profiles.user_id');
        //fetch thir posts
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        //sort by time
        //return;
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts/create');
    }

    public function store() {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image', 'max:13240'],
        ]);


        try {
            $imagePath = request('image')->store('uploads', 'public');

            auth()->user()->posts()->create([
                'caption'=> $data['caption'],
                'image'=> $imagePath,
                ]);
                
        } catch (\Throwable $th) {
            echo 'lamoo got an err';
            dd($th);
        }
         
        return redirect('/profile/'. auth()->user()->id );
    }

    public function show(\App\Models\Post $post) { //fetching post from db v smart
        return view('posts.show', compact('post'));  // is same as 'post'=>$post
    }
}
