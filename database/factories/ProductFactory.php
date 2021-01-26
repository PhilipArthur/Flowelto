<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Seeds\SeederConfig;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'category_id' => rand(1, SeederConfig::$dataCount['category']),
        'name' => $faker->word(),
        'price' => $faker->randomNumber(4),
        'description' => $faker->paragraph(),
        'image' => '\storage\products\\'.$faker->image(SeederConfig::$storagePath.'\products', 640, 480, null, false)
    ];
});
