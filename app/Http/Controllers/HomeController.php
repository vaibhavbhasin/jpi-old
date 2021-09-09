<?php

namespace App\Http\Controllers;

use App\models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        if(!empty(auth()->user())){
            if(\Auth::user()->hasRole('employee')) {
                return redirect("/ach");
            } else if (\Auth::user()->hasRole('admin')) {
                return redirect("/admin");
            } else {
                return redirect("/admin/login");

            } 
		} else {
            return redirect("/admin/login");
        }
    }
}
