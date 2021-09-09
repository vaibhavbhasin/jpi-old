<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    use RegistersUsers; 

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('logincheck');
    }

    public function postUpdateProfile(Request $request){
        
        if ($request->input('password') != '') {
            $requestData = $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'address1' => ['required', 'string', 'max:255'],
                'address2' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'zip' => ['required', 'integer'],
                'password'=>['required', 'regex:/^(?=^.{8,}$)(?=.*\d)(?=.*[!”#$%&\'()*+,-.:;<=>?@[\]^_`{|}~])(?=.*[A-Z])(?=.*[a-z]).*$/i'],
                'password_confirm'=>['required', 'regex:/^(?=^.{8,}$)(?=.*\d)(?=.*[!”#$%&\'()*+,-.:;<=>?@[\]^_`{|}~])(?=.*[A-Z])(?=.*[a-z]).*$/i'],
            ]);
        }else{
            $requestData = $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'address1' => ['required', 'string', 'max:255'],
                'address2' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'zip' => ['required', 'integer'],
            ]);
        }
        
        $data = array();
        $data['firstname']= $request->input('firstname');
        $data['lastname']= $request->input('lastname');
        $data['address1']= $request->input('address1');
        $data['address2']= $request->input('address2');
        $data['city']= $request->input('city');
        $data['state']= $request->input('state');
        $data['zip']= $request->input('zip');
        if($request->input('password') != ''){
            $data['password']= Hash::make($request->input('password'));
        }
        \DB::table('users')->where('id', auth()->user()->id)->update($data);
        return response()->json(['status' => true, 'msg' => 'Updated Successfully.']);
            
    }
}
