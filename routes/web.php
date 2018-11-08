<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('getMovies', [ 'uses' => 'MovieController@getMovies']);
Route::group(['prefix' => 'movies', 'middleware' => []], function () {

    Route::get('/', ['uses' => 'MovieController@index']);
    Route::post('add', ['uses' => 'MovieController@store']);
    Route::get('/{id}', [ 'uses' => 'MovieController@show']);
    Route::put('/{id}', [ 'uses' => 'MovieController@update']);
    Route::delete('/{id}', [ 'uses' => 'MovieController@delete']);
    

});
