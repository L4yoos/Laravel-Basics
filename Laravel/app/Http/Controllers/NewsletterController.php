<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Newsletter;
use App\Notifications\Newsletternotify;
use Illuminate\Support\Facades\Notification;

class NewsletterController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = \Auth::user();
        if($user->is_admin === 1 ){ return view("newsletter.index"); }
        else{ abort(403, "Unathorized action."); }
        
    }
    public function store(Request $request)
    {
        $newsletters = User::whereHas('newsletter', function($q){
            $q->where('consent', 1);
        })->get('email');

        foreach($newsletters as $newsletter)
        {
            $newsletter->notify(new Newsletternotify($request->topic, $request->text) );
        }
        
        return back()->with(
            \Session::flash('success', 'Newsletter został wysłany!')
        );
    }
}
