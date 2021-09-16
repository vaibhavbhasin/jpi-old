<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminAllow
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty(auth()->user())) {
            if (Auth::user()->hasRole('admin')) {
                return $next($request);
            } else {
                return redirect()->route('admin.login');
            }

        }
        return redirect()->route('admin.login');
    }
}
