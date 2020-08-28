<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class OrderDetails extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public static function boot()
    {
        parent::boot();

        // update product quantity after any order
        static::created(function($oD)
        {
            $productAvailableQuantity = Product::where('id', $oD->product_id)->first();
            $newQuantity = $productAvailableQuantity->quantity - $oD->quantity;
            $productAvailableQuantity->quantity = $newQuantity;
            $productAvailableQuantity->save();
        });
    }
}
