<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendMail(Request $request)
    {
        $mailFromName = $request->name;
        $mailFrom = $request->email;
        $mailMessage = $request->message;
        Mail::to('admin@shopmalias.ru')->send(new ContactUs($mailFromName, $mailFrom, $mailMessage));

        session()->flash('success', 'Сообщение отправлено');

        return redirect()->back();
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
