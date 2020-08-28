<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id'=> \App\User::pluck('id')->random(),
        'market_id' => \App\Market::pluck('id')->random(),
    ];
});
