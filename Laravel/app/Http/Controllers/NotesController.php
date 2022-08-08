<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Note;
use App\Notifications\SendNotes;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\RedirectResponse;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\View\View
     */
    public function index() : View
    {
        return view('notes.index', [
            'notes' /*to twoja zmienna a po prawo co sie w niej kryje*/ => Note::where( 'user_id', \Auth::id() )->get()
        ]);//bedzie bardziej słodko :), okej a gdzie w takim razie bedziemy sie odwolywac do naszej zmiennej $notes?
        //oznaczyles wyżej notes (zmienną)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \View
     */

    public function create() : View
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \RedirectResponse
     */

    public function store(Request $request) : RedirectResponse
    {
        $cipa = Note::create( array_merge( $request->all( ), ['user_id' => \Auth::id() ] ) );

        $dupa = User::where( 'id', $cipa->user_id )->first();
        $dupa->notify( new SendNotes( $cipa ) );

        return redirect()->route( 'panel.notes.index' )->with(
            \Session::flash('success', 'Dane zostały chyba dodane a nie zmienione :P ')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Illuminate\View\View
     */

    public function show($id) : View
    {
        return view('notes.show', [
            'note' => Note::where( 'user_id', \Auth::id() )->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*
    public function edit($id)
    {
        //
    }
*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \RedirectResponse
     */
    public function update(Request $request, $id) : RedirectResponse
    {
        Note::where( 'user_id', \Auth::id( ) )->findOrFail($id)->update( $request->all() );
        return back()->with(
            \Session::flash('success', 'Dane zostały zmienione')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \RedirectResponse
     */

    public function destroy($id) : RedirectResponse
    {
        Note::where( 'user_id', \Auth::id())->findorFail($id)->delete();

        return back()->with(
            \Session::flash('success', 'Dane zostały zmienione')
        );
    }
}