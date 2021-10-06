<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
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

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && \Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        Auth::logout();
        $errors = new MessageBag(['password' => ['Invalid credentials']]);
        return Redirect::back()->withErrors($errors);
    }

    // Login
    public function showLoginForm()
    {
        $pageConfigs = ['bodyCustomClass' => 'login-bg', 'isCustomizer' => false];

        return view('/auth/login', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    public function showTpLoginForm()
    {
        Role::firstOrCreate(['guard_name'=>'PreQual Portal Module','name' => 'PreQual - Processor']);
        Role::firstOrCreate(['guard_name'=>'PreQual Portal Module','name' => 'PreQual - Suretec']);
        Role::firstOrCreate(['guard_name'=>'PreQual Portal Module','name' => 'PreQual - Approver']);
        Role::firstOrCreate(['guard_name'=>'PreQual Portal Module','name' => 'PreQual - contractor']);

        $pageConfigs = ['bodyCustomClass' => 'login-bg', 'isCustomizer' => false];
        return view('/trade_partners/auth/login', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
