<?php

return [
    'payhere' => [
        'url' => env('PAYHERE_URL', 'https://sandbox.payhere.lk/pay/checkout'),
        'id' => env('PAYHERE_ID', ''),
        'secret' => env('PAYHERE_SECRET', ''),
    ],
];
