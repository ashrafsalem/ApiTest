<?php

namespace App\Http\Controllers;

use Validator;
use App\Product;
use App\Market;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $data = Product::get();
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
            'price' => 'required',
            'quantity' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(null, 404);
        }
        else
        {
            $product = Product::create($request->all());
            $product->allProducts()->attach(Market::all());

            return response()->json($product , 201);

        }

    }

    public function show(Product $product)
    {
        $data = $product->toArray();
        if(is_null($data))
        {
            return response()->json(null, 404);

        }else
        {
            return response()->json($data, 200);

        }
    }


    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);


        if($validator->fails())
        {

            return response()->json(null, 404);
        }
        else
        {
            return response()->json($product->update($request->all()) , 201);

        }
    }


    public function destroy(Product $product)
    {
        if(is_null($product))
        {
            return response()->json(null, 404);
        }
        else
        {
            $productData = $product->delete();
            $product->allProducts()->detach(Market::all());
            return response()->json($productData,204);
        }
    }
}
