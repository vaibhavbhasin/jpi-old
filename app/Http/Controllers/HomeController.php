<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index(): RedirectResponse
    {
        if (!empty(auth()->user())) {
            if (Auth::user()->hasRole('employee')) {
                return redirect()->route('employee.dashboard');
            } else if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login');
            }
        } else {
            return redirect()->route('admin.login');
        }
    }
}
