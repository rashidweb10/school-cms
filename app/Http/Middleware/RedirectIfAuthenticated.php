<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'web')
    {
        // Replace 'backend' with your backend guard if different
        if (Auth::guard()->check()) {
            return redirect()->route('backend.dashboard');
        }

        // if (app()->environment('production') && $request->getHost() !== '127.0.0.1:8000') {
        //     abort(403, 'Access denied.');
        // }        

        return $next($request);
    }
}