<?php

use Illuminate\Http\Request;
use app\Oferta_Empleo;

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


Route::get('Oferta_Empleo', 'Oferta_EmpleoController@index');
Route::get('Oferta_Empleo/{Oferta_Empleo}', 'Oferta_EmpleoController@show');
Route::post('Oferta_Empleo', 'Oferta_EmpleoController@store');
Route::put('Oferta_Empleo/{Oferta_Empleo}', 'Oferta_EmpleoController@update');
Route::delete('Oferta_Empleo/{Oferta_Empleo}', 'Oferta_EmpleoController@delete');
