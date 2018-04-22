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

Route::get('BooksGetAll','BooksController@index');

Route::post('BookCreate','BooksController@store');

Route::put('BooksEdit/{id}','BooksController@update');

Route::delete('BookDelete/{id}','BooksController@destroy');