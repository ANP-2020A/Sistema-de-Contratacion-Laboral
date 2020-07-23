<?php

use Illuminate\Http\Request;
use app\Oferta_Empleo;
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
Route::get('oferta_empleos', 'Oferta_EmpleoController@index');
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('oferta_empleo', 'Oferta_EmpleoController@index');
    Route::get('oferta_empleo/{ofertaempleo}', 'Oferta_EmpleoController@show');
    Route::post('oferta_empleo', 'Oferta_EmpleoController@store');
    Route::put('oferta_empleo/{ofertaempleo}', 'Oferta_EmpleoController@update');
    Route::delete('oferta_empleo/{ofertaempleo}', 'Oferta_EmpleoController@delete');
});


