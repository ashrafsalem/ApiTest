<?php

use Illuminate\Database\Seeder;

class UserOrdersSeeder extends Seeder
{

    public function run()
    {
        \DB::table('order_details')->delete();
        \DB::table('orders')->delete();
        \DB::table('users')->delete();
        factory(App\User::class, 5)->create()->each(function($user){
            $user->orders()
                ->saveMany(
                    factory(App\Order::class, rand(1, 5))->make()
                )->each(function($o) {
                    $o->orderDetails()->saveMany(
                        factory(App\OrderDetails::class, rand(1, 5))->make()
                    );
                });
        });
    }
}
