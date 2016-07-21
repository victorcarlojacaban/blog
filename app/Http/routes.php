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

Route::get('/', 'PagesController@home');

Route::group(['middleware' => ['revalidate']], function () {
    //Admin
    Route::resource('admin','AdminController', ['except' => 'show']);
    Route::delete('admin/blogs/{id}',['uses' => 'AdminController@destroyBlog', 'as' => 'admin.destroyBlog']);
  	Route::get('admin/blogs/', 'AdminController@blogs');
  	Route::get('admin/users/{username}', 'AdminController@userDetails');
  	Route::get('admin/users', 'AdminController@users');
  	Route::get('admin/post/{title}', 'AdminController@show');
  	    
    //Blog
    Route::resource('blogs','BlogsController');
    Route::post('blogs/{title}/photo','BlogsController@addPhoto');

    //Comments
    Route::post('blogs/{id}/comments',['uses' => 'CommentsController@store', 'as' => 'comments.store']);
    /*Route::resource('comments','CommentsController');
    Route::post('comments/{blog_id}','CommentsController@store');*/
  	
});