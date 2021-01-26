<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Seeds\SeederConfig;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'image' => '\storage\categories\\'.$faker->image(SeederConfig::$storagePath.'\categories', 640, 480, null, false)
    ];
});
