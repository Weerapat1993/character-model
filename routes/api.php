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

// Gallery API
Route::get('/gallery','GalleryController@getApi');
Route::post('/gallery/store','GalleryController@store');
Route::put('/gallery/update/{id}','GalleryController@update')->where('id', '[0-9]+');
Route::delete('/gallery/destroy/{id}','GalleryController@destroy')->where('id', '[0-9]+');
