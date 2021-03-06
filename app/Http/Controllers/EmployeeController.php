<?php

namespace App\Http\Controllers;

use App\Helpers\DwollaHelpers;
use App\Models\Dwolla;
use App\Models\User;
use Auth;
use DwollaSwagger;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Employee"], ['name' => "Dashboard"],
        ];
        $pageConfigs = ['pageHeader' => true];
        $employee_details = User::with('dwolla')->findOrFail(Auth::user()->id);
        $ach = new AchPayment;
        $achTransfers = $ach->getCustomerTransfers(Auth::user()->id);
        return view('pages.employees.dashboard', [
            'pageConfigs' => $pageConfigs,
            'employee_details' => $employee_details,
            'achTransfers' => $achTransfers->_embedded->transfers ?? []], ['breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if ($request['from'] == 'profile_update') {
            $this->validate($request, [
                'firstname' => ['required', 'alpha', 'max:255'],
                'lastname' => ['required', 'alpha', 'max:255'],
                'phone_number' => ['required'],
                'password_confirm' => ['same:password']
            ]);
            $data = [
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'phone_number' => $request['phone_number'],
            ];
            if (@$request['password']) {
                $data['password'] = Hash::make($request->password);
            }
        } elseif ($request['from'] == 'bank_update') {
            $ach = new AchPayment;
            $output = $ach->verifyAchCustomerBank();
            return response()->json($output);
        } elseif ($request['from'] == 'bank_funding_source') {
            if ($request['fundingSource']) {
                $fundingSource = explode('/', $request['fundingSource']);
                $fundingSourceId = end($fundingSource);
                $ach = new AchPayment;
                $ach->generateAchAPIToken();
                $dwolla_api_env_url = config('services.dwolla.env_url');
                $apiClient = new DwollaSwagger\ApiClient($dwolla_api_env_url);
                $accountsApi = new DwollaSwagger\FundingsourcesApi($apiClient);
                $account = $accountsApi->id($fundingSourceId);
                $is_verified = $account->status === 'verified';
                Dwolla::where([
                    'user_id' => auth()->id(),
                ])->update([
                    'funding_source' => $account->_links['self']->href,
                    'funding_source_id' => $account->id,
                    'bank_name' => $account->bank_name,
                    'bank_type' => $account->bank_account_type,
                    'account_name' => $account->name,
                    'is_verified' => $is_verified
                ]);
                if ($is_verified){
                    User::where('id', auth()->id())->update(['is_active' => 1]);
                }
            }
            return response()->json(['msg' => 'success']);
        } else {
            $this->validate($request, [
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
        $achrequest = new Request();
        $achrequest->request->add([
            'achFirstName' => $user['firstname'],
            'achLastName' => $user['lastname'],
            'achEmail' => $user['email']
        ]);
        $achout = $ach->processAchCustomer($achrequest);
        if ($request->ajax()) {
            return response()->json(['msg' => 'success', 'achout' => $achout]);
        }
        return redirect()->back();
    }

    public function UpdateFundingSource(Request $request, User $employee)
    {
        $customer_id = $employee->dwolla->ach_customer_id;
        $dwolla_api_env_url = DwollaHelpers::apiUrl();
        $apiClient = DwollaHelpers::apiClient(true);
        $customersApi = new DwollaSwagger\CustomersApi($apiClient);
        $fsToken = $customersApi->getCustomerIavToken("{$dwolla_api_env_url}/customers/{$customer_id}");
        if ($fsToken->token && !empty($employee->dwolla->funding_source_id)) {
            $fundingSourceApi = new DwollaSwagger\FundingsourcesApi($apiClient);
            $fundingSourceApi->softDelete(['removed' => true], "{$dwolla_api_env_url}/funding-sources/{$employee->dwolla->funding_source_id}");
        }
        return view('pages.employees.funding_source', ['token' => $fsToken->token, 'employee' => $employee]);
    }
}
