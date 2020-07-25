<?php

use Illuminate\Http\Request;
use app\Oferta_;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('oferta', 'OfertaController@index');
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('oferta', 'OfertaController@index');
    Route::get('oferta/{ofertaempleo}', 'OfertaController@show');
    Route::post('oferta', 'OfertaController@store');
    Route::put('oferta/{ofertaempleo}', 'OfertaController@update');
    Route::delete('oferta/{ofertaempleo}', 'OfertaController@delete');
});


