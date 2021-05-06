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

// get stars
Route::get('stars', 'App\Http\Controllers\StarController@index');
Route::get('stars/{id}', 'App\Http\Controllers\StarController@starById');

// create new star
Route::post('stars/new', 'App\Http\Controllers\StarController@create');

// update selected star
Route::put('stars/update/{id}', 'App\Http\Controllers\StarController@update');

// delete selected star
Route::delete('stars/delete/{id}', 'App\Http\Controllers\StarController@delete');