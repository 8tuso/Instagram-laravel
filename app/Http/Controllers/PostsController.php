<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class PostsController extends Controller
{
   public function  __construct(){
    $this->middleware('auth', ['except' => ['getPostWithUser','show']]);
    }


    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);


        $imagePath = request("image")->store('uploads','public');

        $image = Image::read(public_path("storage/{$imagePath}"))->resize(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);


    }

    public function show(Post $post){
        return view('posts.show',compact('post'));
    }

   public function getPostWithUser($postId){

    $post = Post::with('user.profile')->findOrFail($postId);
    $username = $post->user->username;
    return response()->json([
        'post' => $post,
        'user' => $post->user,
        'username' => $username
    ]);

   }



}
