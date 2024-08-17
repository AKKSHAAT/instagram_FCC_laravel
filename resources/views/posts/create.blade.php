@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h1>Add new post</h1>
            <form action="/p" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label fw-bold text-md-end">Post Caption</label>

                    <div class="col-md-6">
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label fw-bold text-md-end">Add Image</label>
                    <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                    
                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="row">
                    <Button class="btn btn-dark w-25 m-auto pt-2"> Post </Button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
