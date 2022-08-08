<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Useractive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::check())
        {
            $user = \Auth::user();
            $user->last_active = now(); // now()->addDays(7);
            $user->save();
        }
        return $next($request);
    }
}
