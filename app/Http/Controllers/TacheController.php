<?php

namespace App\Http\Controllers;

use App\Tache;
use Illuminate\Http\Request;
use Auth;

class TacheController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  date  $date
     * @return \Illuminate\Http\Response
     */
    public function index($date)
    {
        return Auth::user()->taches()->whereDate('date', $date)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tache = Tache::create(['title' => $request->title, 'date' => $request->date, 'completed' => $request->completed, 'user_id' => Auth::user()->id]);

        return $tache;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tache = Tache::findOrFail($id);

        if ($request->has('completed'))
            $tache->completed = $request->completed;
        else
            $tache->title = $request->title;
        $tache->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  boolean  $value
     * @return \Illuminate\Http\Response
     */
    public function allDone(Request $request, $value)
    {
        if ($value === 'true') {
            $tmp = true;
        }
        else
            $tmp = false;

        foreach ($request->request as $tache) {
            $tache = Tache::findOrFail($tache['id']);
            $tache->completed = $tmp;
            $tache->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (Tache::findOrFail($id))->delete();
    }
}
