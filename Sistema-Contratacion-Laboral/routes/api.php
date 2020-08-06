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
    Route::get('ofertas', 'OfertaController@index');
    Route::get('ofertas/{ofertaempleo}', 'OfertaController@show');
    Route::post('ofertas', 'OfertaController@store');
    Route::put('ofertas/{ofertaempleo}', 'OfertaController@update');
    Route::delete('ofertas/{ofertaempleo}', 'OfertaController@delete');
    //experiencias
    Route::get('experiencias', 'ExperienciaController@index');
    Route::get('experiencias/{experiencias}', 'ExperienciaController@show');
    Route::post('experiencias', 'ExperienciaController@store');
    Route::put('experiencias/{experiencias}', 'ExperienciaController@update');
    Route::delete('experiencias/{experiencias}', 'ExperienciaController@delete');
    //estudios
    Route::get('estudios', 'EstudioController@index');
    Route::get('estudios/{estudios}', 'EstudioController@show');
    Route::post('estudios', 'EstudioController@store');
    Route::put('estudios/{estudios}', 'EstudioController@update');
    Route::delete('estudios/{estudios}', 'EstudioController@delete');
    //Postulaciones
    Route::get('postulacions', 'PostulacionController@index');
    Route::get('postulacions/{postulacions}', 'PostulacionController@show');
    Route::post('postulacions', 'PostulacionController@store');
    Route::put('postulacions/{postulacions}', 'PostulacionController@update');
    Route::delete('postulacions/{postulacions}', 'PostulacionController@delete');
});


