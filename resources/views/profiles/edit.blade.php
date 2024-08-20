@extends('layouts.app')
 
@section('content')
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label fw-bold text-md-end">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title}}"  autocomplete="title" autofocus>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label fw-bold text-md-end">Description</label>

                    <div class="col-md-6">
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}"  autocomplete="description" autofocus>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="url" class="col-md-4 col-form-label fw-bold text-md-end">URL</label>

                    <div class="col-md-6">
                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url}}"  autocomplete="url" autofocus>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label fw-bold text-md-end">profile Image</label>
                    <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                    
                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="row">
                    <Button class="btn btn-dark w-25 m-auto pt-2"> save profile </Button>
                </div>
            </div>
        </form>
    </div>
@endsection
