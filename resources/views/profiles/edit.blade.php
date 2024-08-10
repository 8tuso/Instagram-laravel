@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row mb-3">
                    <h1>Edit Profile</h1>
                </div>
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input id="title"
                           type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           name="title"
                           value="{{ old('title') ?? $user->profile->title}}"
                           autocomplete="title" autofocus>
                    @error('title')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <input id="bio"
                           type="text"
                           class="form-control @error('bio') is-invalid @enderror"
                           name="bio"
                           value="{{ old('bio') ?? $user->profile->bio}} "
                           autocomplete="bio" autofocus>
                    @error('bio')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">URL</label>
                    <input id="url"
                           type="text"
                           class="form-control @error('url') is-invalid @enderror"
                           name="url"
                           value="{{ old('url') ?? $user->profile->url}}"
                           autocomplete="url" autofocus>
                    @error('url')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="image" name="image">

                    @if($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
