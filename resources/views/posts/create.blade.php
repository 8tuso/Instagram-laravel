@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/p" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row mb-3">
                        <h1>Add New Post</h1>
                    </div>
                    
                    <div class="mb-3">
                        <label for="caption" class="form-label">Post Caption</label>
                        <input id="caption"
                               type="text"
                               class="form-control @error('caption') is-invalid @enderror"
                               name="caption"
                               value="{{ old('caption') }}"
                               autocomplete="caption" autofocus>
                        @error('caption')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Post Image</label>
                        <input type="file" class="form-control" id="image" name="image">

                        @if($errors->has('image'))
                                <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add New Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
