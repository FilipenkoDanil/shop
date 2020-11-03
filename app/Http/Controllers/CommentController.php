<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request, Product $product)
    {
        $comment = new Comment;
        $comment->product_id = $product->id;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->rating = $request->rating;
        $comment->save();

        session()->flash('success', __('main.add_comment'));
        return redirect()->back();
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();
        $comment->product->updateRating();

        return redirect()->back();
    }
}
