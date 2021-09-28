<?php

namespace App\Http\Controllers;

use App\Models\Dwolla;
use App\Models\User;
use Auth;
use DwollaSwagger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;

class AchPayment extends Controller
{

    public function addAchCustomer()
    {
        return view('addAchCustomer');
    }

    public function processAchCustomer(Request $request)
    {
        $rules = array(
            'achFirstName' => 'required|regex:/^[a-zA-Z\s]+$/',
            'achLastName' => 'required|regex:/^[a-zA-Z\s]+$/',
            'achEmail' => 'required|email',
        );
        $validatorMesssages = array(
            'achFirstName.required' => 'First name is required.',
            'achLastName.required' => 'Last name is required.',
            'achEmail.required' => 'Email address is required.',
            'achEmail.email' => 'Enter valid email address.',
        );
        $data = $request->request->all();
        $validator = Validator::make([
            'achFirstName' => $data['achFirstName'],
            'achLastName' => $data['achLastName'],
            'achEmail' => $data['achEmail'],
        ], $rules, $validatorMesssages);
        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
            return redirect('add-ach-customer')
                ->withErrors($validator)
                ->withInput();
        } else {
            $this->generateAchAPIToken();
            $dwolla_api_env_url = config('services.dwolla.env_url');
            $apiClient = new DwollaSwagger\ApiClient($dwolla_api_env_url);
            $customersApi = new DwollaSwagger\CustomersApi($apiClient);
            $customers = $customersApi->_list(1, 0, null, null, null, $data['achEmail']);
            if ($customers->total) {
                $ach_customer_id = $customers->_embedded->{'customers'}[0]->id;
                $customers->_embedded->{'customers'}[0]->email;
                $customersApi->updateCustomer([
                    'firstName' => $data['achFirstName'],
                    'lastName' => $data['achLastName'],
                    'ipAddress' => $_SERVER['REMOTE_ADDR']
                ], $ach_customer_id);
            } else {
                $customer = $customersApi->create([
                    'firstName' => $data['achFirstName'],
                    'lastName' => $data['achLastName'],
                    'email' => $data['achEmail'],
                    'type' => "receive-only",
                    'ipAddress' => $_SERVER['REMOTE_ADDR']
                ]);
                $customers = $customersApi->_list(1, 0, null, null, null, $data['achEmail']);
                $ach_customer_id = $customers->_embedded->{'customers'}[0]->id;
            }
            $dwolla = Dwolla::updateOrCreate([
                'user_id' => Auth::user()->id,
            ], [
                'ach_customer_id' => $ach_customer_id
            ]);
            return ['msg' => 'success'];
        }
    }

    // public function verifyAchCustomerBank(Request $request){
    public function verifyAchCustomerBank()
    {
        $this->generateAchAPIToken();
        $dwolla_api_env_url = config('services.dwolla.env_url');
        $apiClient = new DwollaSwagger\ApiClient($dwolla_api_env_url);
        $customersApi = new DwollaSwagger\CustomersApi($apiClient);
        $fundingsourcesApi = new DwollaSwagger\FundingsourcesApi($apiClient);
        $dwolla_data = Dwolla::where('user_id', Auth::user()->id)->first();
        $ach_customer_id = @$dwolla_data['ach_customer_id'];
        if (!empty($ach_customer_id)) {
            $customer_fund_source = $fundingsourcesApi->getCustomerFundingSources($ach_customer_id);
            if (isset($customer_fund_source->_embedded->{'funding-sources'}[0]->id)) {
                $fund_sources = $customer_fund_source->_embedded->{'funding-sources'};
                $dwolla = Dwolla::where('user_id', auth()->id())->first();
                if (empty($dwolla->funding_source_id)) {
                    $account = $fundingsourcesApi->id($fund_sources[0]->id);
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
                return ['fund_sources' => $fund_sources, 'fsToken' => ''];
            } else {
                $fsToken = $customersApi->getCustomerIavToken($dwolla_api_env_url . "/customers/" . $ach_customer_id);
                return ['fsToken' => $fsToken->token];
            }
        } else {
            return ['error' => 'ACH customer account is not added.'];
        }

    }

    public function achPaymentProcess()
    {
        return view('achPaymentProcess');
    }

    public function achPaymentSubmit(Request $request)
    {

        $rules = array(
            'paymentAmount' => 'required|integer',
        );

        $validatorMesssages = array(
            'paymentAmount.required' => 'Payment amount is required.',
            'paymentAmount.integer' => 'Payment amount must be a valid number.',
        );

        $validator = Validator::make($request->request->all(), $rules, $validatorMesssages);

        $request_data = $request->request->all();

        if ($validator->fails()) {

            return redirect('ach-payment-process')
                ->withErrors($validator)
                ->withInput();
        } else {
            // generate Dwolla API access token.
            $this->generateAchAPIToken();

            $ach_customer_id = $request_data['customer_id']; // get saved ach_customer_id from database;

            $dwolla_api_env_url = config('services.dwolla.env_url');
            $dwolla_api_fund_id = config('services.dwolla.fund_id');

            $apiClient = new DwollaSwagger\ApiClient($dwolla_api_env_url);

            $customersApi = new DwollaSwagger\CustomersApi($apiClient);
            $fundingsourcesApi = new DwollaSwagger\FundingsourcesApi($apiClient);
            $customer_fund_source = $fundingsourcesApi->getCustomerFundingSources($ach_customer_id);


            $rootApi = new DwollaSwagger\RootApi($apiClient);

            $root = $rootApi->root();
            $accountUrl = $root->_links["account"]->href;

            $fundingSources = $fundingsourcesApi->getAccountFundingSources($accountUrl, $removed = false);

            if (isset($customer_fund_source->_embedded->{'funding-sources'}[0]->id) && isset($fundingSources->_embedded->{'funding-sources'}[0]->id)) {
                $fund_sources = $customer_fund_source->_embedded->{'funding-sources'};
                $source_fund = $fundingSources->_embedded->{'funding-sources'};

                // $transfer_request = array ( '_links' => array ( 'source' =>
                //                             array ( 'href' => $dwolla_api_env_url.'/funding-sources/'.$fund_sources[0]->id, ),
                //                             'destination' =>
                //                             array ( 'href' => $dwolla_api_env_url.'/funding-sources/'.$dwolla_api_fund_id,
                // ), ),
                // 'amount' => array ( 'currency' => 'USD', 'value' => $request->request->paymentAmount ) );

                $transfer_request = array('_links' => array('source' =>
                    array('href' => $dwolla_api_env_url . '/funding-sources/' . $source_fund[0]->id,),
                    'destination' =>
                        array('href' => $dwolla_api_env_url . '/funding-sources/' . $fund_sources[0]->id,
                        ),),
                    'amount' => array('currency' => 'USD', 'value' => $request_data['paymentAmount']));

                $transferApi = new DwollaSwagger\TransfersApi($apiClient);
                $transferUrl = $transferApi->create($transfer_request);

                if ($transferUrl != '') {
                    $transferData = $transferApi->byId($transferUrl);

                    // save $transferData->id to database and send email notification;
                    return $transferData->id;
                    Session::flash('success', "Bill payment has successfully completed. Transaction ID: " . $transferData->id);
                    return Redirect::to('ach-payment-process');
                } else {
                    return 'failed';
                    $this->payment_failed_email($user);
                    Session::flash('error', "Bill payment has failed. Please try again.");
                    return Redirect::to('ach-payment-process');
                }
            } else {
                return 'failed';
                $this->payment_failed_email($user);
                Session::flash('error', "Your bank account not verified.");
                return Redirect::to('ach-payment-process');
            }
        }
    }

    public function getCustomerTransfers($id)
    {
        $dwolla = Dwolla::where('user_id', $id)->first();
        if ($dwolla) {
            $this->generateAchAPIToken();
            $dwolla_api_env_url = config('services.dwolla.env_url');
            $apiClient = new DwollaSwagger\ApiClient($dwolla_api_env_url);

            $customerUrl = 'http://api-sandbox.dwolla.com/customers/' . $dwolla['ach_customer_id'];

            $TransfersApi = new DwollaSwagger\TransfersApi($apiClient);

            $transfers = $TransfersApi->getCustomerTransfers($customerUrl);

        }

        return $transfers ?? [];

    }

    public function generateAchAPIToken()
    {
        $dwolla_api_key = config('services.dwolla.key');
        $dwolla_api_secret = config('services.dwolla.secret');
        $dwolla_api_env_url = config('services.dwolla.env_url');
        $basic_credentials = base64_encode($dwolla_api_key . ':' . $dwolla_api_secret);
        $ch = curl_init($dwolla_api_env_url . '/token');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $basic_credentials, 'Content-Type: application/x-www-form-urlencoded;charset=UTF-8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = json_decode(curl_exec($ch));

        $token = $data->access_token;
        DwollaSwagger\Configuration::$access_token = $token;
        curl_close($ch);
    }

    public function updateFundingSource(User $employee, array $data)
    {
        $this->generateAchAPIToken();
        $dwolla_api_env_url = config('services.dwolla.env_url');
        $apiClient = new DwollaSwagger\ApiClient($dwolla_api_env_url);
        $fundingsourcesApi = new DwollaSwagger\FundingsourcesApi($apiClient);
        $response = $fundingsourcesApi->update([
            'name' => $data['bank_nickname'],
            'accountNumber' => $data['bank_account'],
            'routingNumber' => $data['routing'],
        ], $employee->dwolla->funding_source_id);
        $customerUrl = "{$dwolla_api_env_url}/funding-sources/{$employee->ach_customer_id}";
    }
}
