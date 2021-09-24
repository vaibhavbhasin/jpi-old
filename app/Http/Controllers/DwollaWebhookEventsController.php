<?php

namespace App\Http\Controllers;

use App\Helpers\DwollaHelpers;
use DwollaSwagger\WebhooksubscriptionsApi;
use Illuminate\Http\Request;

class DwollaWebhookEventsController extends Controller
{
    public function index(Request $request)
    {
        $this->verifyGatewaySignature(config('app.docs.github_webhook_secret'), $request);
        \Log::info($request->all());
        $apiClient = DwollaHelpers::apiClient(true);
        $webhookApi = new \DwollaSwagger\WebhooksApi($apiClient);
        $webhookUrl = DwollaHelpers::apiUrl()."webhook-subscriptions/add084e8-810f-4f4e-bbe3-075c4d577082";
        $response = $webhookApi->hooksById($webhookUrl);
        dd($response);
    }

    public function subscribe()
    {
        $apiClient = DwollaHelpers::apiClient(true);
        $webhookApi = new WebhooksubscriptionsApi($apiClient);
        return $webhookApi->create(array(
//            'url' => route('dwolla.webhooks'),
            'url' => 'https://dev.jpi.com/dwolla-webhooks',
            'secret' => 'dwollaWebhook@#2021!JPI',
        ));
        //https://api-sandbox.dwolla.com/webhook-subscriptions/21afa175-a690-477f-8ca2-7b465bf8110a
    }

    public function retrieveSubscribe($id = 'add084e8-810f-4f4e-bbe3-075c4d577082')
    {
        //add084e8-810f-4f4e-bbe3-075c4d577082 subscription id;

        //e17fd8e6-2b9c-4c90-911f-655a24d0153f webhook_id
        $apiClient = DwollaHelpers::apiClient(true);
        /*
        $webhookApi = new \DwollaSwagger\WebhooksApi($apiClient);
        $response = $webhookApi->hooksById('https://api-sandbox.dwolla.com/webhook-subscriptions/add084e8-810f-4f4e-bbe3-075c4d577082');
        */

        /*$webhookApi = new WebhooksubscriptionsApi($apiClient);
        $response= $webhookApi->_list();*/



        $webhooksApi = new \DwollaSwagger\WebhooksApi($apiClient);
        $webhookUrl = "https://api-sandbox.dwolla.com/webhooks/{$id}";
        $response = $webhooksApi->id($webhookUrl);
        dump($response->topic);
        /*
        $apiClient = DwollaHelpers::apiClient(true);
        $webhookApi = new WebhooksubscriptionsApi($apiClient);
        $response = $webhookApi->id($id);
        */
        dd($response);
    }

    function verifyGatewaySignature($proposedSignature, $webhookSecret, $payloadBody) {
        $signature = hash_hmac("sha256", $payloadBody, $webhookSecret);
        return hash_equals($signature, $proposedSignature);
    }
}
