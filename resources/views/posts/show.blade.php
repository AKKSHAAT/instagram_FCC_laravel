@extends('layouts.app')
 
    @section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img class="w-100" src="/storage/{{ $post->image }}">
        </div>
        <div class="col-4 mb-5">
            <div class="d-flex align-items-center">
                <div >
                    <image 
                        style="max-width: 40px;"
                        class="w-100 rounded-circle inline" 
                        src="/storage/{{ $post->user->profile->profileImage() }}">
                </div>
                <div style="margin:0 20px 0;">
                    <a  href="/profile/{{ $post->user->id }}" 
                        style="color: black; text-decoration: none;">
                        <h3>{{ $post->user->username }}</h3>
                    </a>
                    
                </div>
                <div>
                    <a href="#" class="">follow</a>
                </div>
            </div>
            <hr>
            <p class="col-4 mt-3">
                <span>
                    <strong>{{ $post->user->username }}</strong>
                </span>    
                {{ $post->caption }}
            </p>
        </div>
    </div>
</div>
@endsection
