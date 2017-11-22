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

Route::namespace('Api')->group( function() {
    Route::get('/', 'PlayerController@collect');
    Route::get('/{player}/get', 'PlayerController@get');
    Route::put('/put', 'PlayerController@put');
    Route::patch('/{player}/patch', 'PlayerController@patch');
    Route::delete('/{player}/delete', 'PlayerController@delete');
});
