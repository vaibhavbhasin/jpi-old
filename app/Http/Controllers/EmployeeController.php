<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dwolla;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\AchPayment;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Employee"], ['name' => "Dashboard"],
        ];
        //Pageheader set true for breadcrumbsqq
        $pageConfigs = ['pageHeader' => true];

        $employee_details = User::findOrFail(\Auth::user()->id);

        $ach = new AchPayment;
        $achTransfers = $ach->getCustomerTransfers(\Auth::user()->id);
        return view('pages.employees.dashboard', ['pageConfigs' => $pageConfigs , 'employee_details' => $employee_details , 'achTransfers' => $achTransfers->_embedded->transfers?? []], ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request['from'] == 'profile_update'){
            $this->validate($request,[
                'firstname'=> 'required',
                'lastname'=> 'required',
                'password_confirm' => 'same:password'
            ]);

            $data = [
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],     
            ];
            if(@$request['password'])
            {
                $data['password'] = Hash::make($request->password);
            }
        }
        elseif($request['from'] == 'bank_update'){
            $ach = new AchPayment;
            
            // $data = $this->validate($request,[
            //     'bank_account'=> 'required',
            //     'routing'=> 'required',
            //     'bank_nickname' => 'required'
            // ]);

            // $achrequest = new \Illuminate\Http\Request();

            // $achrequest->request->add([
            //                         // 'bank_account' => $data['bank_account'],
            //                         // 'routing' => $data['routing'],
            //                         // 'bank_nickname' => $data['bank_nickname']
            //                     ]);
            
            $output = $ach->verifyAchCustomerBank();
            // dd($output);

            // if($request->ajax()){
            //     return response()->json(['msg' => 'success']);
            // }
            // return response()->json($ach->verifyAchCustomerBank($achrequest));
            return response()->json($output);

        }
        elseif($request['from'] == 'bank_funding_source'){
            if($request['fundingSource']){
                    $dwolla = Dwolla::where([
                        'user_id' => \Auth::user()->id,
                    ])->first()->update([
                        'funding_source' => $request['fundingSource']
                    ]);

                    User::where('id',\Auth::user()->id)->first()->update(['is_active' => 1]);
                }

            return response()->json(['msg'=> 'success']);
        }
        else{
            $this->validate($request,[
                'address1' => 'required',
                'city' => 'required',
                'zip' => 'required',
                'state' => 'required',
            ]);

            $data = [
                'address1' => $request['address1'],
                'address2' => $request['address2'] ?? null,
                'zip' => $request['zip'],
                'state' => $request['state'],
                'city' => $request['city'],
            ];
        }

        $user = User::findOrFail($id);

        $user->update($data);

        $ach = new AchPayment;
        $achrequest = new \Illuminate\Http\Request();
        $achrequest->request->add([
                                    'achFirstName' => $user['firstname'],
                                    'achLastName' => $user['lastname'],
                                    'achEmail' => $user['email']
                                ]);

        $achout = $ach->processAchCustomer($achrequest);

        if($request->ajax()){
            return response()->json(['msg' => 'success', 'achout'=>$achout]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
