<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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

        return [
            'Pon Number' => $this['id'],
            'User' => \App\User::find($this['user_id'])->first()->name,
            'Market' => \App\Market::find($this['market_id'])->first()->name
        ];
    }
}
