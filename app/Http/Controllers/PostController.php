<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class PostController extends Controller
{

    public function __construct() {   
        $this->middleware('auth');
    }


    public function index() {
        return view('posts/create');
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
