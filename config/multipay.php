<?php

return [
    'default' => 'zarinpal',

    'drivers' => [
        'zarinpal' => [
            'merchant_id'  => env('ZARINPAL_MERCHANT_ID'),
            'callback_url' => env('APP_URL') . '/payment/callback',
            'description'  => 'پرداخت تستی فروشگاه',
            'sandbox'      => env('ZARINPAL_SANDBOX', false),
            'api_url'      => env('ZARINPAL_SANDBOX', false) ? 'https://sandbox.zarinpal.com/pg/services/WebGate/wsdl' : 'https://www.zarinpal.com/pg/services/WebGate/wsdl',
        ],
    ],
];

