<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TransactionDetail;
use Faker\Generator as Faker;
use Seeds\SeederConfig;

$factory->define(TransactionDetail::class, function (Faker $faker) {
    return [
        'transaction_id' => rand(1, SeederConfig::$dataCount['transaction']),
        'product_id' => rand(1, SeederConfig::$dataCount['product']),
        'quantity' => rand(1, 10)
    ];
});
