<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class EmployeeLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Login
    public function showLoginForm()
    {
        $pageConfigs = ['bodyCustomClass' => 'login-bg', 'isCustomizer' => false];
        return view('/auth/employeelogin', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        $msg = 'Invalid credentials';
        if (Auth::attempt($credentials) && Auth::user()->hasRole('employee')) {
            if (!auth()->user()->is_active) {
                return redirect()->route('employee.dashboard');
            }
            $msg = 'Inactive account';
        }
        $errors = new MessageBag(['password' => [$msg]]);
        Auth::logout();
        return Redirect::back()->withErrors($errors)->withInput()->exceptInput('password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('employee.login.show');
    }

}
