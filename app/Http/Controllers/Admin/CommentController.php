<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user')->with('product')->where('status', 0)->get();

        return view('auth.comments.index', compact('comments'));
    }

    public function publish(Comment $comment)
    {
        $comment->status = 1;
        $comment->save();
        $comment->product->updateRating();

        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }
}
