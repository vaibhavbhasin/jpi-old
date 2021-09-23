<?php

namespace App\Helpers;

use DwollaSwagger\{
    Configuration,
    ApiClient,
    TokensApi,
    FundingsourcesApi,
    TransfersApi
};

class DwollaHelpers
{
    /**
     * @var DwollaHelpers
     */
    protected $apiKey;
    protected $apiSecret;
    protected $apiUrl;
    protected $apiFundingSourceId;

    public function __construct()
    {
        $this->apiKey = config('services.dwolla.key');
        $this->apiSecret = config('services.dwolla.secret');
        $this->apiUrl = config('services.dwolla.env_url');
        $this->apiFundingSourceId = config('services.dwolla.fund_id');
    }

    public static function apiUrl()
    {
        $self = new static;
        return $self->apiUrl;
    }

    public static function apiClient($tokenRegenerate = false): ApiClient
    {
        $self = new static;
        Configuration::$username = $self->apiKey;
        Configuration::$password = $self->apiSecret;
        if ($tokenRegenerate) {
            self::token();
        }
        return new ApiClient($self->apiUrl);
    }

    public static function token()
    {
        $apiClient = self::apiClient();
        $tokensApi = new TokensApi($apiClient);
        return Configuration::$access_token = $tokensApi->token()->access_token;
    }

    public static function transfer($user, $amount = 75)
    {
        $self = new static;
        $apiClient = self::apiClient();
        $fundingSourceApi = new FundingsourcesApi($apiClient);
        $fundingSource = $fundingSourceApi->id($user->funding_source_id);
        if ($fundingSource->status == 'verified' && $fundingSource->removed === false) {
            $transfer_request = [
                '_links' => [
                    'source' => [
                        'href' => "{$self->apiUrl}/funding-sources/{$self->apiFundingSourceId}"
                    ],
                    'destination' => [
                        'href' => "{$self->apiUrl}/funding-sources/{$user->funding_source_id}"
                    ]
                ],
                'amount' => [
                    'currency' => 'USD', 'value' => $amount
                ]
            ];

            $transferApi = new TransfersApi($apiClient);
            $transferUrl = $transferApi->create($transfer_request);
            if ($transferUrl !== null) {
                return $transferApi->byId($transferUrl);
            }
        }
        return false;
    }

    public static function getLastString($string, $separator = '/', $index = 'end')
    {
        $string_to_array = explode($separator, $string);
        if ($index === 'end') {
            return end($string_to_array);
        } else {
            return $string_to_array[$index] ?? false;
        }
    }

}

