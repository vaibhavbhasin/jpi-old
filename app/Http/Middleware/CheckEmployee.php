<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEmployee
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
        if(!empty(auth()->user())){
            if(\Auth::user()->hasRole('employee'))
			    return $next($request);
            else   
            {
                // Auth::logout();
                return redirect("/ach/login");

            } 
		}
        return redirect("/ach/login");
    }
}
