<?php

namespace App\Http\Controllers;

use Validator;
use App\Order;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderDetailsResource;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        $data = Order::get();
        if(is_null($data))
        {
            return response()->json(null, 404);
        }else
        {
            return response()->json($data, 200);
        }

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'market_id' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(null, 404);
        }
        else
        {
            $order = Order::create($request->only(['market_id', 'user_id']));
            $response['Order'] = $order;

            $details = $request->only(['product_id','quantity']);

            for($i = 0; $i < count($details['product_id']) ; $i++)
            {
                $response['OrderDetails'] = $order->orderDetails()->create(
                    [
                        'product_id' => $details['product_id'][$i],
                        'quantity'=>$details['quantity'][$i]
                    ]
                    );
            }


            return response()->json($response , 201);

        }

    }

    public function show(Order $order)
    {
        $response['Order'] = new OrderResource($order, 200);

        if(is_null($response['Order']))
        {
            return response()->json(null, 404);

        }else
        {
            $orderDetails = $order->orderDetails()->get();
            $response['OrderDetails'] = new OrderDetailsResource($orderDetails, 200);

            return response()->json($response, 200);

        }
    }

}
