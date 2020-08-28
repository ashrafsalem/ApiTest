<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        $product = array();
        $allData = array();
        $returnData = array();

        for ($i=0; $i < $this->count(); $i++)
        {
            $allData = array_merge(\App\Product::find($this[$i]['product_id'])->toArray() ,['quantity_new' => $this[$i]['quantity']]);
            array_push($product, $allData);
        }

        for($j=0; $j < count( $product); $j++)
        {
            $name = $product[$j]['name'];
            $price = $product[$j]['price'];
            $quantity = $product[$j]['quantity_new'];

            array_push($returnData, ['Product Name'=>$name, 'price'=>$price, 'quantity'=>$quantity]);
        }

        return $returnData;

    }
}
