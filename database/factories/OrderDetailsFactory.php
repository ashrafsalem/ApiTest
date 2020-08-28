<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderDetails;
use Faker\Generator as Faker;

$factory->define(OrderDetails::class, function (Faker $faker) {
    return [
        'order_id' => \App\Order::pluck('id')->random(),
        'product_id' => \App\Product::pluck('id')->random(),
        'quantity' => $faker->numberBetween(1, 5)
    ];
});
