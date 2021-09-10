<?php

namespace App\Http\Controllers;
use DwollaSwagger;

class TestController extends Controller
{
    public function index()
    {
        $ach = new AchPayment;
        $ach->generateAchAPIToken();
        $dwolla_api_env_url = config('services.dwolla.env_url');
        $apiClient = new DwollaSwagger\ApiClient($dwolla_api_env_url);

        $fundingsourcesApi = new DwollaSwagger\FundingsourcesApi($apiClient);
        /*
        $response = $fundingsourcesApi->id('d7750c0e-58c1-46b4-9f4c-1c41c5946f04');
        $response = $fundingsourcesApi->createCustomerFundingSource([
            'name'=>'test',
            'accountNumber'=>'123456789',
            'routingNumber'=>'123456789',
        ],'a27f974f-ff6f-4b25-a227-e0afc6fef22b');
        */
        /*$fundingSource = $fundingsourcesApi->createCustomerFundingSource([
            "routingNumber" => "222222226",
            "accountNumber" => "123456789",
            "bankAccountType" => "checking",
            "name" => "Jane Doe’s Checking"
        ], "https://api-sandbox.dwolla.com/customers/a27f974f-ff6f-4b25-a227-e0afc6fef22b");*/

        /*
        $response = $fundingsourcesApi->createCustomerFundingSource([
            "name"=>'Jane Doeaas Checking test',
            "accountNumber"=>"123456780",
            "routingNumber"=>"222222226",
            "bankAccountType" => "checking",
        ],'https://api-sandbox.dwolla.com/customers/a27f974f-ff6f-4b25-a227-e0afc6fef22b');
        dd($response);
        */

        $customersApi = new DwollaSwagger\CustomersApi($apiClient);
        $fsToken = $customersApi->getCustomerIavToken($dwolla_api_env_url . "/customers/a27f974f-ff6f-4b25-a227-e0afc6fef22b");
        ?>
        <div id="iavContainer"
             style="background: black;display: block;position: fixed;z-index: 100000;top: 5%;width: 70%;right: 20%;left: 20%; overflow-y: scroll;"></div>
        <script src="https://cdn.dwolla.com/1/dwolla.js"></script>
        <script>
            function callDwollaBankPopup() {
                var iavToken = "<?=$fsToken->token?>";
                dwolla.configure('sandbox');
                dwolla.iav.start(iavToken, {
                    container: 'iavContainer',
                    stylesheets: [
                        'https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext'
                    ],
                    microDeposits: 'false',
                    //   fallbackToMicroDeposits: (fallbackToMicroDeposits.value === 'true')
                    fallbackToMicroDeposits: ('true')
                }, function (err, res) {

                    console.log('Error: ' + JSON.stringify(err) + ' -- Response: ' + JSON.stringify(res));
                    if (err) {
                        toastr.error('Some errors occured!');
                    } else if (res._links['funding-source']['href']) {
                        submitBankFundingSource(res._links['funding-source']['href']);
                        // location.reload();
                    }
                });
            }

            callDwollaBankPopup()
        </script>
        <?php
        /*


        $accountsApi = new DwollaSwagger\FundingsourcesApi($apiClient);
        $accountUrl = "{$dwolla_api_env_url}/accounts/67b3cbab-cb01-4ed8-b90b-12c9cbeb5722/funding-sources";
        $account = $accountsApi->id('67b3cbab-cb01-4ed8-b90b-12c9cbeb5722');
        $caccount = $accountsApi->getCustomerFundingSources('cc79b321-88cd-4ed8-9a6d-b6f58eeb54c8');
        dump($account->id);
        dump($account->name);
        dump($account->status);
        dump($account->bank_name);
        dump($account->bank_account_type);
        dump($caccount);
        dd($account);
//fc0246d4-3e75-46c2-bf9f-a93a1b93d1b3
        // Permission::create(['name'=>'edit']);
        $role = Role::findById(auth()->user()->role_id);
        $permission = Permission::findById(auth()->user()->role_id);

        $role->givePermissionTo($permission);
        dd($permission);
        // auth()->user()->givePermissionTo('create');;
        // auth()->user()->assignRole('admin_view');;

        // dd(auth()->user()->role_id);
        return auth()->user()->permissions;
        return "Test";
        */
    }
}
