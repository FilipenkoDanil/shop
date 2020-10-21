<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function about()
    {
        return view('static.about');
    }

    public function contact()
    {
        return view('static.contact');
    }

    public function shipping()
    {
        return view('static.shipping');
    }

    public function warranty()
    {
        return view('static.warranty');
    }
}
