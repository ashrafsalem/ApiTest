<?php

namespace App\Http\Controllers;

use App\Market;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function index(Market $market, Order $order, User $user)
    {
        $user = $user;
        $order_id = Order::where('market_id', $market)->where('_id', $order)->get()->id;
        //$all = OrderDetails::where('order_id', $)
    }
}
