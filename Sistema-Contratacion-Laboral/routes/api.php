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

Route::post('registerU', 'UserController@register');
Route::post('loginU', 'UserController@authenticate');
Route::post('registerE', 'EmpresaController@register');
Route::post('loginE', 'EmpresaController@authenticate');
Route::get('ofertas', 'OfertaController@index');
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
        //ofertas
        //Route::get('ofertas', 'OfertaController@index');
        Route::get('ofertas/{ofertaempleo}', 'OfertaController@show');
        Route::post('ofertas', 'OfertaController@store');
        Route::put('ofertas/{ofertaempleo}', 'OfertaController@update');
        Route::delete('ofertas/{ofertaempleo}', 'OfertaController@delete');
        //experiencias
        Route::get('user/experiencias', 'ExperienciaController@index');
        Route::get('user/{user}/experiencias/{experiencias}', 'ExperienciaController@show');
        Route::post('user/{user}/experiencias', 'ExperienciaController@store');
        Route::put('user/{user}/experiencias/{experiencias}', 'ExperienciaController@update');
        Route::delete('user/{user}/experiencias/{experiencias}', 'ExperienciaController@delete');
        //estudios
        Route::get('estudios', 'EstudioController@index');
        Route::get('estudios/{estudios}', 'EstudioController@show');
        Route::post('estudios', 'EstudioController@store');
        Route::put('estudios/{estudios}', 'EstudioController@update');
        Route::delete('estudios/{estudios}', 'EstudioController@delete');
        //Postulaciones
        Route::get('user/postulacions', 'PostulacionController@index');
        Route::get('postulacions/{postulacions}', 'PostulacionController@show');
        Route::post('postulacions', 'PostulacionController@store');
        Route::put('postulacions/{postulacions}', 'PostulacionController@update');
        Route::delete('postulacions/{postulacions}', 'PostulacionController@delete');
});


