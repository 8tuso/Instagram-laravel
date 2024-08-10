<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Post;

class CommentsController extends Controller
{
    //
    public function store(Request $request, $postId)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
        ]);
    
        $comment = new Comments([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'username' => auth()->user()->username,
            'comment' => $validated['comment'],
        ]);
    
        $comment->save();
    
        return redirect()->back();
    }
}
