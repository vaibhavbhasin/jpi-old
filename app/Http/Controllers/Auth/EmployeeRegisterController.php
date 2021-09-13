<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::EMPLOYEEDASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            // 'address1' => ['required', 'string', 'max:255'],
            // 'address2' => ['required', 'string', 'max:255'],
            // 'city' => ['required', 'string', 'max:255'],
            // 'state' => ['required', 'string', 'max:255'],
            // 'zip' => ['required', 'integer'],
            // 'bank_account' => ['required', 'integer'],
            // 'bankname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'regex:/(.*)@(jpi)\.com/i', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            // 'address1' => $data['address1'],
            // 'address2' => $data['address2'],
            // 'city' => $data['city'],
            // 'state' => $data['state'],
            // 'zip' => $data['zip'],
            // 'bank_account' => $data['bank_account'],
            // 'bankname' => $data['bankname'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('employee');
        Auth::login($user);
        //return redirect()->route('employeedashboard');

        return $user;
    }

    // Register
    public function showRegistrationForm()
    {
        $pageConfigs = ['bodyCustomClass' => 'register-bg', 'isCustomizer' => false];

        return view('/auth/employeeregister', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    public function checkEmailUnique(): JsonResponse
    {
        return User::where('email', request()->email)->exists() ? response()->json([
            'msg' => 'Email has already been taken.',
            'status' => false
        ]) : response()->json([
            'msg' => '',
            'status' => true
        ]);
    }

}
