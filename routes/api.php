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

// Movie Api Resources
Route::get('movies', 'MovieController@index');
Route::get('movie/{id}', 'MovieController@show');
Route::post('movie', 'MovieController@store');
Route::put('movie', 'MovieController@store');
Route::delete('movie/{id}', 'MovieController@destroy');


// User Api Reousrces
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/users', 'UserController@index');
    Route::post('/user', 'UserController@store');
    Route::put('/user', 'UserController@store');
    Route::delete('/user/{id}', 'UserController@destroy');
});