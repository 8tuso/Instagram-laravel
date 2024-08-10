@extends('layouts.app')


<style>
    a{
        text-decoration: none !important;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" class="w-100">
            </div>
            <div class="col-4 h-100">
                <div class="d-flex align-items-center">
                    <div class="pe-3">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                    <div>
                        <div class="fw-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">   
                                    {{$post->user->username}}
                                </span> 
                            </a>
                            <span class="ps-1">•</span>
                            <a href="#" class="ps-1">Follow</a>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                    <span class="fw-bold pe-1">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">
                                {{$post->user->username}}
                            </span>
                        </a>
                    </span>
                    {{$post->caption}}
                </p>

                <div class="d-flex flex-column">
                
                    @foreach($post->comments as $comment)
                    <div class="d-flex mt-3">
                        <img src="/storage/{{ $comment->user->profile->image }}" class="rounded-circle me-2" style="width: 35px"></img>
                        <p class="align-items-center mb-1"><strong>{{ $comment->username }}:</strong> {{ $comment->comment }}</p>
                    </div>

                    @endforeach
                </div>


                <div style="transform: translate(0, 100%);">
                    @auth
                    <form action="{{ route('comments.store',$post->id)}}" method="POST" class="d-flex flex-column">
                        @csrf
                        <div class="form-group mb-3 flex-grow-1">
                            <label for="comment">Your Comment</label>
                            <textarea name="comment" id="comment" cols="1" rows="1" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Post</button>
                    </form>
                </div>
                @endauth
            </div>

        </div>
    </div>
@endsection

