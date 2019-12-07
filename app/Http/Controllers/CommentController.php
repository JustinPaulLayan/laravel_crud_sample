<?php

namespace App\Http\Controllers;

use App\Model\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:255'
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'comment' => $request->comment
        ]);

        return  redirect()->back()->with('success', 'Comment is successfully added');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return  redirect()->back()->with('success', 'comment is successfully deleted');
    }
}
