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

Route::get('all', 'ProductController@loadData');
Route::get('search', 'ProductController@search');
Route::get('detail/{item_code}', 'ProductController@detail');
Route::get('create', 'ProductController@create');
Route::get('update/{item_code}', 'ProductController@update');
Route::get('delete/{item_code}', 'ProductController@delete');