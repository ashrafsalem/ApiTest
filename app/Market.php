<?php

namespace App;

use App\Product;
use App\Order;
use Illuminate\Database\Eloquent\Model;


class Market extends Model
{
    protected $fillable = ['name', 'address'];

    public function allProducts()
    {
        return $this->belongsToMany(Product::class, 'allProducts')->withTimestamps();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /*
     * conflict occur when running db:seed
     * it helpful in real , but no when using faker
     * */

//    public static function boot()
//    {
//        parent::boot();
//
//        static::created(function($market){
//            $market->allProducts()->attach(Product::all());
//        });
//
//        static::deleted(function ($market){
//            $market->allProducts()->detach(Product::all());
//        });
//    }
}
