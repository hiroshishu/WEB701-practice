<?php

use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

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

Route::post('updateInfo', function(){
    $user = Auth::user();
    $user->phone = Request('phone');
    $user->address = Request('address');
    $user->intro = Request('intro');
    $user->is_grower = Request('is_grower');
    $user->save();
    return json_encode(array('code'=>200));
})->middleware('auth:api');

Route::get('growers', function(){
    return App\User::where('is_grower', '1')->orderBy('created_at', 'desc')->paginate(8);
});

Route::get('categories', function(){
    return App\Category::all();
})->name('categories');

Route::apiResource('items', 'ItemController');

Route::post('bid/{item}', 'BidController@makeBid')
    ->middleware('auth:api');

Route::post('endAuction/{item}', 'ItemController@endBid')
    ->middleware('auth:api');

//This one line of code will automatically generate following REST api routes for us
//Route::get('items',           'ItemController@index');
//Route::post('items',          'ItemController@store');
//Route::get('items/{id}',      'API\ItemController@show');
//Route::put('items/{id}',      'API\ItemController@update');
//Route::delete('items/{id}',   'API\ItemController@destroy');
