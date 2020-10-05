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
Route::post('create', 'ProductController@create');
Route::post('update/{item_code}', 'ProductController@update');
Route::delete('delete', 'ProductController@delete');