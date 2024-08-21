<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    public function index($user)
    {   
        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;   //
        // dd($follows);


        $postCount = Cache::remember(
            'count.posts' . $user->id, 
            now()->addSeconds(30), 
            function()use($user) {
                $user->posts->count();
            });


        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();

        return view('profiles.index',compact(
            'user',
            'follows',
            'postCount',
            'followersCount',
            'followingCount'
        ));
            
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $data = request()->validate([
            'title' => 'required',
            'description' => '',
            'url' => '',
            'image' => ''
        ]);
        
        
        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $imageArr = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArr ?? []
        ));

        return redirect('/profile/'. $user->id);

    }
}
