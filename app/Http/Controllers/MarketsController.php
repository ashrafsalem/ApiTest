<?php

namespace App\Http\Controllers;

use App\Market;
use App\OrderDetails;
use App\Product;
use Validator;
use Illuminate\Http\Request;

class MarketsController extends Controller
{

    public function index()
    {
        $data = Market::get();
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
            'name' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(null, 404);
        }
        else
            {
                $market = Market::create($request->all());
                $market->allProducts()->attach(Product::all());

                return response()->json($market , 201);

            }

    }

    public function show(Market $market)
    {
        $data = $market->toArray();
        if(is_null($data))
        {
            return response()->json(null, 404);

        }else
            {
                return response()->json($data, 200);

            }
    }


    public function update(Request $request, Market $market)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required'
        ]);


        if($validator->fails())
        {

            return response()->json(null, 404);
        }
        else
        {
            return response()->json($market->update($request->all()) , 201);

        }
    }


    public function destroy(Market $market)
    {
        if(is_null($market))
        {
            return response()->json(null, 404);
        }
        else
            {
                $marketData = $market->delete();
                $market->allProducts()->detach(Product::all());
                return response()->json($marketData,204);
            }
    }

    public function salesCount(Market $market)
    {
        $orders = $market->orders()->get()->pluck('id');

        $response['Market'] = $market;
        $response['Products_Sold_Amount']  =  OrderDetails::whereIn('order_id', $orders)->count();

        return response()->json($response , 200);
    }
}
