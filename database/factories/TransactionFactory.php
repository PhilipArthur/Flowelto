<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;
use Seeds\SeederConfig;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'user_id' => rand(2, SeederConfig::$dataCount['user'] + 1),
        'date' => $faker->date()
    ];
});
