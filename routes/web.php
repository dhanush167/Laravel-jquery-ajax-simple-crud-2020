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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'RegisterController@getRegister')->name('register');
Route::post('/register', 'RegisterController@postRegister')->name('register');

Route::get('/forgotPassword', 'ForgotPasswordController@getForgotPassword')->name('forgotPassword');
Route::post('/forgotPassword', 'ForgotPasswordController@postForgotPassword')->name('forgotPassword');

Route::get('/changePassword', 'ChangePasswordController@getChangePassword')->name('changePassword');
Route::post('/changePassword', 'ChangePasswordController@postChangePassword')->name('changePassword');

Route::get('/login', 'AuthController@getLogin')->name('login');
Route::post('/login', 'AuthController@postLogin')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/posts', 'PostsController@index');
Route::post('/posts', 'PostsController@addPost');
Route::get('/posts/edit/{post_id?}', 'PostsController@editPost');
Route::post('/posts/update/{post_id?}', 'PostsController@updatePost');
Route::delete('/posts/{post_id?}', 'PostsController@deletePost');
