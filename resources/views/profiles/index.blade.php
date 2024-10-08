@extends('layouts.app')

@vite('resources/js/app.js')

@section('content')
<div id="nigga">
  <div class="container">
    <div class="row">
      <div class="col-3 p-5">
        <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
      </div>
      <div class="col-9 pt-5">
        <div class="d-flex justify-content-between align-items-baseline">
          <div class="d-flex align-items-center pb-3">
            <div class="h3">{{ $user->username }}</div>

              <follow-button :user-id="{{ $user->id }}" :follows="{{ $follows }}"></follow-button>

          </div>
          @can('update', $user->profile)
            <a href="/p/create">Add New Post</a>
          @endcan
        </div>
        @can('update', $user->profile)
          <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
        @endcan
        <div class="d-flex">
          <div class="pe-5"><strong>{{ $postsCount }}</strong> posts</div>

        <!--  <div class="pe-5"><strong>{{ $postsCount }}</strong> posts</div>
          <div class="pe-5"><strong>{{ $followersCount }}</strong> followers</div>
          <div class="pe-5"><strong>{{ $followingCount }}</strong> following</div>
          -->
        </div>
        <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
        <div>{{ $user->profile->bio }}</div>
        <div><a href="#">{{ $user->profile->url }}</a></div>
      </div>
    </div>
    <div class="row pt-5">
      @foreach($user->posts as $post)
        <div class="col-4 pb-4" id="posts-list">
          <a href="#" @click.prevent="showPost({{ $post->id }})"><img src="/storage/{{$post->image}}" class="w-100"></a>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Popup Component -->
  <pop-post v-if="showPopup" :post-id="postId" @close="showPopup = false"></pop-post>
</div>
@endsection
