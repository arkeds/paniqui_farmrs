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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usage/{purpose}/machines', 'API\MachinePurposeController@machines');
Route::get('/farmers', 'API\FarmerController@index');
Route::get('/animal/{id}', 'API\AnimalController@show');
Route::get('/tree/{id}', 'API\TreeController@show');
Route::get('/crop/{id}', 'API\CropController@show');