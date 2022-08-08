<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        // dd($users);
        
        return view("home", ["users"=>$users]);
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
            
            
            $user->is_admin = $request->is_admin;
            $user->phone = $request->phone;
            
            $user->save();

            $newsletter = New Newsletter;
            $newsletter->user_id = Auth::id();
            $newsletter->consent = $request->consent ?? 0;
            $newsletter->save();               

            // $newsletter->user_id = Auth::id();         //to powinno iść przez Auth::id(), bo jak user wprowadzi takie cos a dobra tu nie masz
            // $newsletter->consent = ;
            // $newsletter->save();
    
            return back()->with(
    
                \Session::flash('success', 'Dane zostały zmienione')
            );
    }
}
