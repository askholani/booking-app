<?php
return [
    'is_production' => false, // Use 'false' for Sandbox
    'merchant_id'   => env('MIDTRANS_MERCHANT_ID', 'YOUR_MERCHANT_ID'),
    'client_key'    => env('MIDTRANS_CLIENT_KEY', 'YOUR_CLIENT_KEY'),
    'server_key'    => env('MIDTRANS_SERVER_KEY', 'YOUR_SERVER_KEY'),
];
