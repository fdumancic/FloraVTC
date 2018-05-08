<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});

Route::get('/address/places', 'AddressController@places');
Route::get('/address/streets', 'AddressController@streets');
Route::get('/address/numbers', 'AddressController@numbers');
Route::get('/customers', 'TrashcanController@list');
Route::put('/customers/{customer_id}', 'TrashcanController@update');