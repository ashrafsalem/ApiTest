<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Market;
use Faker\Generator as Faker;

$factory->define(Market::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => rtrim($faker->sentence(rand(1,3)), '.')
    ];
});
