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

Route::prefix('clients')->group(function(){
    Route::get('/','ClientsController@index');
    Route::get('/{id}',"ClientsController@show");
    Route::post('/','ClientsController@store');
    Route::delete('/{id}',"ClientsController@destroy");
    Route::put("/{id}","ClientsController@update");
    Route::delete("/{id}/plan/{planId}", "ClientsController@deletePlanVincle");
    Route::put("/{id}/plan/{planId}","ClientsController@addPlan");
});

Route::prefix('plans')->group(function(){
    Route::get('/','PlansController@index');
});
