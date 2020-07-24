<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promotion;
use Faker\Generator as Faker;

$factory->define(Promotion::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'price' => $faker->randomDigit,
        'address' => $faker->address,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude
    ];
});
