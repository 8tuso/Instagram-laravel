<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Laravel\Facades\Image;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
   /* public function index($user)
    {
       $user= User::findOrFail($user);
        return view('profiles.index',[
            'user'=> $user,
        ]);
    }*/

    public function index(User $user){

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postsCount = Cache::remember(
            'count.posts'. $user->id,
            now()->addSeconds(30),
            function() use ($user)
            {
                return $user->posts->count();
            }
        );

        $followersCount =Cache::remember(
            'count.followers'. $user->id,
            now()->addSeconds(30),
            function() use ($user)
            {
                return $user->profile->followers->count();
            }
        );
        
      
        $followingCount = Cache::remember(
            'count.following'. $user->id,
            now()->addSeconds(30),
            function() use ($user)
            {
                return $user->following->count();
            }
        );
        

        return view('profiles.index', compact('user','follows','postsCount','followersCount','followingCount'));
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);
        $data= request()->validate([
            'title'=>'required',
            'bio'=>'',
            'url'=>'url',
            'image'=>'image',
        ]);
        

        if(request('image')){

            $imagePath = request("image")->store('profile','public');

            $image = Image::Read(public_path("storage/{$imagePath}"))->resize(100,100);
            $image->save();
            $imageArray =  ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect("/profile/{$user->id}");
    }

 

}


