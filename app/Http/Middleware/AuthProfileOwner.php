<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use auth;


class AuthProfileOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->id != auth()->user()->id) {
            return redirect('profile/'.auth()->user()->id)->with('warning', 'You do not have permission to do this');
        }
        return $next($request);
    }
}
