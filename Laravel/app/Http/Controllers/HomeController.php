<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();   
        return view("home", ["users"=>$users]);
    }
    public function test()
    {
        return view("index");
    }
    public function delete( User $user)
    {
        $user->delete();

        return back()->with(

            \Session::flash('success', 'User został usunięty')
        );
    }
    public function show( User $user)
    {

        if(($user->newsletter == NULL ) && ($user->wallet == NULL)){
            $newsletter = new Newsletter;
            $newsletter->user_id = Auth::id();
            $newsletter->consent = 0;
            $newsletter->timestamps = Carbon::now();
            $newsletter->save();

            $wallet = new Wallet;
            $wallet->user_id = Auth::id();
            $wallet->balance = 0;
            $wallet->timestamps = Carbon::now();
            $wallet->save();

            return back()->with('success', 'Wejdz ponownie aby zobaczyć swoje dane!');
        }

       return view('show', ["user"=>$user,]);
    }
    public function update( User $user, Request $request )
    {
            $validated = $request->validate([
                'name' => 'required|string|min:5',
                'email' => 'sometimes|nullable|string|email|max:255|email:rfc,dns,filter|unique:users',
                'password' => 'sometimes|nullable|string|min:8|confirmed|',
                'phone' => 'sometimes|numeric|min:9',
            ]);
    
            if( $request->filled('password') )
            {
                $user->password = Hash::make($request->password);
            }
    
            if( $request->filled('email') )
            {
                $user->email = $request->email;
            }

            $user->name = $request->name;
             
            $user->phone = $request->phone;
            
            $user->save();

            $newsletter = $user->newsletter;
            $newsletter->consent = $request->consent ?? 0;
            $newsletter->updated_at = Carbon::now();
            $newsletter->save();               
    
            return back()->with(
    
                \Session::flash('success', 'Dane zostały zmienione')
            );
    }
}
