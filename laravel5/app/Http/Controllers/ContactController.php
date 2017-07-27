<?php


namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'bail|required|between:5,20|alpha',
            'email' => 'bail|required|email',
            'texte' => 'bail|required|max:250'
        ]);

        Mail::send('emails.contact', $request->all(), function($message)
        {
            $message->to('monadresse@free.fr')->subject('Contact');
        });

        return view('confirm');
    }
}
