@extends('layouts.app')


<style>
    a{
        text-decoration: none !important;
    }
</style>
@section('content')
    

    <div id="nigga">
        <div class="container">
            @foreach($posts as $post)
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="" @click.prevent="showPost({{$post->id}})"><img src="/storage/{{$post->image}}" class="w-100"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3 pt-2 pb-4">
                    
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
                </div>
    
            </div>
            @endforeach
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{$posts->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>

        <pop-post v-if="showPopup" :post-id="postId" @close="showPopup = false"></pop-post>

    </div>

    
@endsection

