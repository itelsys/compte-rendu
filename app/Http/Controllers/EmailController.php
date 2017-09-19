<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use Config;
use App\Mail\Report;
use App\User;
use App\Email;

class EmailController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function generate()
    {
    	$taches = Auth::user()->taches->where('completed', true);

        $users = User::all();

    	return view('emails.generatedCr', compact('taches', 'users'));
    }

    public function send(Request $request)
    {
        Config::set('mail.from.address', Auth::user()->email);
        Config::set('mail.from.name', Auth::user()->name);

        if ($request->cc == null)
        	Mail::to($request->users)->send(new Report($request->content, $request->subject));
        else
            Mail::to($request->users)->cc($request->cc)->send(new Report($request->content, $request->subject));

        Auth::user()->emails()->create(['content' => $request->content]);

    	return redirect()->back()->with('email-sended', 'Message envoyé');
    }

    public function showSended()
    {
        return view('sended', ['emails' => Auth::user()->emails()->latest()->get()]);
    }
}
