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

Route::get('categories/', function(){
    return App\Category::all();
})->name('categories');

Route::apiResource('items', 'ItemController');

//This one line of code will automatically generate following REST api routes for us
//Route::get('items',           'ItemController@index');
//Route::post('items',          'ItemController@store');
//Route::get('items/{id}',      'API\ItemController@show');
//Route::put('items/{id}',      'API\ItemController@update');
//Route::delete('items/{id}',   'API\ItemController@destroy');
