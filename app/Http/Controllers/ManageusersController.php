<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ManageusersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin_role');
    }
    public function Index(){
        return view('/manageusers/index');
    }
    public function Adduser(){
       return view('/manageusers/adduser');
    }

    public function postSaveUser(Request $request){
        // dd("OKKK");
        $validated  = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'address1' => ['required', 'string', 'max:255'],
            'address2' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=>['required', 'regex:/^(?=^.{8,}$)(?=.*\d)(?=.*[!”#$%&\'()*+,-.:;<=>?@[\]^_`{|}~])(?=.*[A-Z])(?=.*[a-z]).*$/i'],
            'password_confirmation'=>['required', 'regex:/^(?=^.{8,}$)(?=.*\d)(?=.*[!”#$%&\'()*+,-.:;<=>?@[\]^_`{|}~])(?=.*[A-Z])(?=.*[a-z]).*$/i'],
        ]);

        $data = array();
        $data['firstname']= $request->input('firstname');
        $data['lastname']= $request->input('lastname');
        $data['address1']= $request->input('address1');
        $data['address2']= $request->input('address2');
        $data['city']= $request->input('city');
        $data['state']= $request->input('state');
        $data['zip']= $request->input('zip');
        $data['bankname']= $request->input('bankname');
        $data['bank_account']= $request->input('bank_account');
        $data['email']= $request->input('email');
        $data['role_id']= '2';
        $data['password']= Hash::make($request->input('password'));

        User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'bank_account' => $data['bank_account'],
            'bankname' => $data['bankname'],
            'password' => $data['password'],
        ]);
        return redirect('/add-user')->with('success', 'User Added Successfully');
        // dd($data);

        // \DB::table('users')->where('id', auth()->user()->id)->update($data);
        // return response()->json(['status' => true, 'msg' => 'Updated successfully']);

    }
}
