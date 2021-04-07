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

Route::group(['middleware' => 'api', 'namespace'  => 'App\Http\Controllers', 'prefix' => 'contact'], function () {
    Route::get('/', 'ContactController@index');
    Route::get('/{id}', 'ContactController@show');
    Route::post('/', 'ContactController@store');
    Route::put('/{id}', 'ContactController@update');
});
