<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZynlePayService
{
    public function initiatePayment($requestData)
    {
        $url = 'https://www.zynlepay.com/zynlepay/jsonapi/';

        // Send POST request using Laravel HTTP client
        return Http::post($url, $requestData)->json();
    }
}
