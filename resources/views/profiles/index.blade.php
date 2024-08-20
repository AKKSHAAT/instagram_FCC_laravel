@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img 
                src="{{ $user->profile->profileImage() }}"
                class="rounded-circle w-100 "
                >
            </div>
            <div class="col-9 pt-5">

                <djv class="d-flex pb-2">
                    <div class="h3">{{ $user->username }}</div> 
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </djv>
                @can('update', $user->profile)
                <div class="d-flex justify-content-between "> 
                    <a  class="m-2" href="/p/create">New Post+</a>
                </div>
                <a  class="m-2" href="/profile/{{ $user->id }}/edit">
                    Edit profile
                </a>
                @endcan

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
