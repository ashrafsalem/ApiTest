<?php

namespace App;

use App\User;
use App\Market;
use App\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['market_id', 'user_id'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function market()
    {
        return $this->belongsTo(Market::class);
    }
}
