<?php


namespace App\ViewComposers;


use App\Models\Comment;
use Illuminate\View\View;

class NewCommentsComposer
{
    public function compose(View $view)
    {
        $newComments = count(Comment::where('status', 0)->get());

        $view->with('newComments', $newComments);
    }
}
