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
    	$taches = Auth::user()->taches()->where([['completed', true], ['sended', false]])->get();

        $users = User::all();

    	return view('emails.generatedCr', compact('taches', 'users'));
    }

    public function send(Request $request)
    {
        Config::set('mail.from.address', Auth::user()->email);
        Config::set('mail.from.name', Auth::user()->name);

        if ($request->cc == null) {
            try {
                Mail::to($request->users)->send(new Report($request->content, $request->subject));
            }catch(\Exception $e){
                return redirect()->back()->with('email-not-sended', $e->getMessage());
            }
        }
        else {
            try {
                Mail::to($request->users)->cc($request->cc)->send(new Report($request->content, $request->subject));
            }catch(\Exception $e){
                return redirect()->back()->with('email-not-sended', $e->getMessage());
            }
        }

        $this->updateTache(Auth::user()->taches()->where([['completed', true], ['sended', false]])->get());

    	return redirect()->back()->with('email-sended', 'E-mail envoyé');
    }

    public function updateTache($taches) {
        foreach ($taches as $tache) {
            $tache->sended = true;
            $tache ->save();
        }
    }
}
