<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Contributor
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
        
        if (!Auth::guard('contributor')->check()) {
            return redirect('/contributor/login');
        }

        if (Auth::guard('contributor')->check() && Auth::guard('contributor')->user()->status == 0) {
            session()->flash('error', 'Akun anda Tidak memiliki akses!');
            return redirect('/');
        }
        return $next($request);
    }
}
