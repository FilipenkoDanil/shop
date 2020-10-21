<?php


namespace App\ViewComposers;


use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    public function compose(View $view)
    {
        $catsMenu = Category::all();
        $view->with('catsMenu', $catsMenu);
    }
}
