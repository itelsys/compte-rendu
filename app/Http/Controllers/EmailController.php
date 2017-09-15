<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use Config;
use App\Mail\Report;
use App\User;

class EmailController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function generate()
    {
    	$taches = Auth::user()->taches->where('completed', true);

    	return view('emails.generatedCr', compact('taches'));
    }

    public function send(Request $request)
    {
        Config::set('mail.from.address', Auth::user()->email);
        Config::set('mail.from.name', Auth::user()->name);

    	Mail::to(User::first())->send(new Report($request->content));

    	return redirect()->back()->with('email-sended', 'Message envoyé');
    }
}
