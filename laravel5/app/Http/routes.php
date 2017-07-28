<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('article/{n}', 'WelcomeController@show')->where('n', '[0-9]+');


Route::get('users', 'UsersController@getInfos');
Route::post('users', 'UsersController@postInfos');

Route::get('contact', 'ContactController@create');
Route::post('contact', 'ContactController@store');

Route::get('photo', 'PhotoController@create');
Route::post('photo', 'PhotoController@store');

Route::controller('email', 'EmailController');


Route::group(['middleware' => ['web']], function () {
    // Add your routes here
    Route::resource('user', 'UserController');

});

//Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);


Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);
Route::get('post/tag/{tag}', 'PostController@indexTag');

//Route::resource('names', 'NameController');
Route::resource('names', array('before' => 'basic.once'), 'NameController');
