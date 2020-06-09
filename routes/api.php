<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/projeto')->group(function () {

    Route::get('/', 'ProjetoController@index');

    Route::get('/simple', 'ProjetoController@index_simple');

    Route::post('/', 'ProjetoController@store');
});

Route::prefix('/atividade')->group(function () {

    Route::get('/', 'AtividadeController@index');
    Route::get('/{id}', 'AtividadeController@show');
    Route::post('/', 'AtividadeController@store');
    Route::put('/{id}', 'AtividadeController@update');
    Route::delete('/{id}', 'AtividadeController@destroy');
});
