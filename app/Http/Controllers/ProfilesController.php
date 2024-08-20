<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user)
    {   
        $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;   //
        // dd($follows);
        return view('profiles.index',[
            'user'=> $user,
            'follows' => $follows
        ]);
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
