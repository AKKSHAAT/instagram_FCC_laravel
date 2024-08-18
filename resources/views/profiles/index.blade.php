@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img 
                src="data:image/jpeg;base64,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" 
                class="rounded-circle"
                >
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between "> 
                    
                    <h1>{{ $user->username }}</h1> 
                    <a  class="m-2" href="/p/create">New Post+</a>
                </div>
                <div class="d-flex"> 
                    <div class="px-1"><strong>{{$user->posts->count()}}</strong> Posts</div>
                    <div class="px-3"><strong>2k</strong> Followers</div>
                    <div class=""><strong>69</strong> Followings</div>
                </div>
                <div> <strong>{{ $user->profile->title }} </strong></div>
                <div class="pt-4">
                {{ $user->profile->description }}
            </div>
            <div>
                <a href="#">{{ $user->profile->url }}</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 d-flex">
            @foreach($user->posts as $post)
                <div class="m-1 w-100">
                    <a href="/p/{{ $post->id }}">
                        <img
                            style="width: 20vw; height: 20vw; object-fit: cover;"
                            src="/storage/{{$post -> image}}">
                    </a>
                </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
