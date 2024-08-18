@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img class="w-100" src="/storage/{{ $post->image }}">
        </div>
        <div class="col-4">
            <div>
                <a  href="/profile/{{ $post->user->id }}" 
                    style="color: black; text-decoration: none"
                >
                    <h3>{{ $post->user->username }}</h3>
                </a>
                <p>{{ $post->caption }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
