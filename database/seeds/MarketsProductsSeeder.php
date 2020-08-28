<?php

use App\Product;
use App\Market;
use Illuminate\Database\Seeder;

class MarketsProductsSeeder extends Seeder
{

    public function run()
    {
        \DB::table('products')->delete();
        \DB::table('markets')->delete();

        factory(Market::class, 5)->create();
        factory(Product::class, 5)->create()->each(function($product)
        {
            $product->allProducts()->attach(Market::all());
        });

    }
}
