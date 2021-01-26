<?php

namespace Seeds;

class SeederConfig {
    public static $storagePath = 'storage\app\public';

    public static $dataCount = [
        'user' => 5,
        'category' => 3,
        'product' => 15,
        'transaction' => 20,
        'transaction_detail' => 40
    ];
}