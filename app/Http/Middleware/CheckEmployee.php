<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEmployee
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
        if (!empty(auth()->check())) {
            if (auth()->user()->hasRole('employee')) {
                return $next($request);
            } else {
                return redirect()->route('employee.login.show');
            }
        }
        return redirect()->route('employee.login.show');
    }
}
