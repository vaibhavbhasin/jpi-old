<?php

namespace App\Http\Controllers;

use App\Helpers\DwollaHelpers;
use App\Models\DwollaTransactionHistory;
use App\Models\DwollaWebhookEvent;
use DwollaSwagger\ApiException;
use DwollaSwagger\WebhooksubscriptionsApi;
use Illuminate\Http\Request;

class DwollaWebhookEventsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->view_data) {
            return DwollaWebhookEvent::all();
        }
        if ($request->data_delete) {
            return \DB::table('dwolla_webhook_events')->truncate();
        }
        $request->validate([
            'id' => 'required|unique:dwolla_webhook_events,event_id'
        ]);
        $topic = $request->topic;
        $event_id = $request->id;
        $resource_id = $request->resourceId;
        if ($topic === 'customer_transfer_completed') {
            $apiClient = DwollaHelpers::apiClient(true);
            $transfersApi = new \DwollaSwagger\TransfersApi($apiClient);
            $response = $transfersApi->byId($resource_id);
            try {
                if (!empty($response->status)) {
                    $transfer = [
                        'status' => ucfirst($response->status),
                    ];
                    DwollaTransactionHistory::where(['transaction_id' => $resource_id])->update($transfer);
                }
                DwollaWebhookEvent::firstOrCreate(
                    [
                        'topic' => $topic,
                        'event_id' => $event_id,
                        'resource_id' => $resource_id,
                        'action' => true,
                    ],
                    [
                        'payload' => $request->post()
                    ]
                );
            } catch (ApiException $exception) {

            }
        }
        /*DwollaWebhookEvent::create(
            [
                'topic' => $topic,
                'event_id' => $event_id,
                'resource_id' => $resource_id,
                'payload' => $request->post()
            ]
        );*/
    }

    function verifyGatewaySignature($proposedSignature, $webhookSecret, $payloadBody)
    {
        $signature = hash_hmac("sha256", $payloadBody, $webhookSecret);
        return hash_equals($signature, $proposedSignature);
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

    private function customerTransferCompleted(Request $request)
    {
        $apiClient = DwollaHelpers::apiClient(true);
        $transfersApi = new \DwollaSwagger\TransfersApi($apiClient);
        $transfer = $transfersApi->byId($request->resource_id);
        DwollaWebhookEvent::create(
            [
                'topic' => $request->topic,
                'event_id' => $request->id,
                'resource_id' => $request->resourceId,
                'payload' => $transfer,
                'action' => true,
            ]
        );
    }

    private function customerBankTransferCompleted(Request $request)
    {
        $apiClient = DwollaHelpers::apiClient(true);
        $transfersApi = new \DwollaSwagger\TransfersApi($apiClient);
        $transfer = $transfersApi->byId($request->resource_id);

        DwollaWebhookEvent::create(
            [
                'topic' => $request->topic,
                'event_id' => $request->id,
                'resource_id' => $request->resourceId,
                'payload' => $transfer,
                'action' => true,
            ]
        );

    }

    private function transferCompleted(Request $request)
    {
        $apiClient = DwollaHelpers::apiClient(true);
        $transfersApi = new \DwollaSwagger\TransfersApi($apiClient);
        $transfer = $transfersApi->byId($request->resource_id);

        DwollaWebhookEvent::create(
            [
                'topic' => $request->topic,
                'event_id' => $request->id,
                'resource_id' => $request->resourceId,
                'payload' => $transfer,
                'action' => true,
            ]
        );
    }
}
