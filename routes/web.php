<?php

use App\Http\Controllers\CommentsController;
use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/email', function(){
    return new NewUserWelcomeMail();
});

Route::post('/follow/{user}', 'App\Http\Controllers\FollowsController@store');

Route::get('/', [PostsController::class, 'index']);
Route::get('/p/create', [PostsController::class, 'create']);
Route::get('/p/{post}', [PostsController::class, 'show']);
Route::post('/p', [PostsController::class, 'store']);

Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'update'])->name('profile.update');

// API route for fetching post data
Route::get('/post-data/{postId}', [PostsController::class, 'getPostWithUser']);

Route::post('/p/{post}/', [CommentsController::class, 'store'])->name('comments.store');

