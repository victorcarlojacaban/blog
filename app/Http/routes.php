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
/*applying web middlewate group to every routes*/


//User
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::auth();
Route::get('/', 'HomeController@index');


Route::group(['middleware' => ['revalidate']], function () {
    //Blog
	Route::resource('blogs','BlogsController');
	Route::resource('comments','CommentsController');
});