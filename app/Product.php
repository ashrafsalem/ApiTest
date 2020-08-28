<?php

namespace App;

use App\Market;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = ['name', 'price', 'quantity'];

    public function allProducts()
    {
        return $this->belongsToMany(Market::class, 'allProducts')->withTimestamps();
    }

//    public static function boot()
//    {
//        parent::boot();
//
//        static::created(function($product){
//            $product->allProducts()->attach(Market::all());
//        });
//
//        static::deleted(function ($product){
//            $product->allProducts()->detach(Market::all());
//        });
//    }
}
