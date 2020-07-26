<?php

use Illuminate\Http\Request;
use app\Oferta;
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
    //ofertas
    Route::get('oferta', 'OfertaController@index');
    Route::get('oferta/{ofertaempleo}', 'OfertaController@show');
    Route::post('oferta', 'OfertaController@store');
    Route::put('oferta/{ofertaempleo}', 'OfertaController@update');
    Route::delete('oferta/{ofertaempleo}', 'OfertaController@delete');
    //experiencias
    Route::get('experiencia', 'ExperienciaController@index');
    Route::get('experiencia/{experiencias}', 'ExperienciaController@show');
    Route::post('experiencia', 'ExperienciaController@store');
    Route::put('experiencia/{experiencias}', 'ExperienciaController@update');
    Route::delete('experiencia/{experiencias}', 'ExperienciaController@delete');
    //estudios
    Route::get('estudio', 'EstudioController@index');
    Route::get('estudio/{estudios}', 'EstudioController@show');
    Route::post('estudio', 'EstudioController@store');
    Route::put('estudio/{estudios}', 'EstudioController@update');
    Route::delete('estudio/{estudios}', 'EstudioController@delete');
    //Postulaciones
    Route::get('postulacion', 'PostulacionController@index');
    Route::get('postulacion/{postulacions}', 'PostulacionController@show');
    Route::post('postulacion', 'PostulacionController@store');
    Route::put('postulacion/{postulacions}', 'PostulacionController@update');
    Route::delete('postulacion/{postulacions}', 'PostulacionController@delete');
});


