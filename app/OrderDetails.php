<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderDetails extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
