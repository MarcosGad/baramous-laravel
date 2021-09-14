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
Route::post('register', 'API\RegisterController@register');
Route::get('homepage', 'API\AtherApiController@homepage');
Route::get('hsystem', 'API\AtherApiController@hsystem');
Route::get('tablehgz', 'API\AtherApiController@tablehgz');
Route::get('post', 'API\AtherApiController@post');
Route::get('dayof', 'API\AtherApiController@dayof');
Route::get('alarm', 'API\AtherApiController@alarm');
Route::get('aya', 'API\AtherApiController@aya');
Route::get('downloood', 'API\AtherApiController@downloood');

Route::middleware('auth:api')->group( function () {
	Route::resource('hagz', 'API\HagzApiController');
	Route::resource('massage', 'API\MassageApiController');
    Route::resource('user', 'API\userApiController');
    Route::resource('note', 'API\NoteApiController');
    Route::resource('userN', 'API\userNApiController');
});

Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'api',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'ResetPasswordApiController@create');
});