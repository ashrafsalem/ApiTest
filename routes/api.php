<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/allMarkets', 'MarketsController@index');
    Route::get('/singleMarket/{market}', 'MarketsController@show');
    Route::post('/market', 'MarketsController@store');
    Route::put('/market/{market}', 'MarketsController@update');
    Route::delete('/market/{market}','MarketsController@destroy');

// **** the market + the products sold amount
    Route::get('/markerSalesCount/{market}', 'MarketsController@salesCount');

    Route::get('/allProducts', 'ProductsController@index');
    Route::get('/singleProduct/{product}', 'ProductsController@show');
    Route::post('/product', 'ProductsController@store');
    Route::put('/product/{product}', 'ProductsController@update');
    Route::delete('/product/{product}','ProductsController@destroy');

// **** retrieve all Orders
    Route::get('/allOrders', 'OrdersController@index');
// **** retrieve the pon data
    Route::get('/singleOrder/{order}', 'OrdersController@show');
// **** store new purchase
    Route::post('/order', 'OrdersController@store');
});

//Route::middleware('auth:sanctum')->get('/singleMarket/{market}', 'MarketsController@show');


// *** login with sanctum
Route::post('/login','UserController@index');



