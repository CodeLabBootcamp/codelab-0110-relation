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


Route::group(["prefix" => "/dashboard"], function () {
    Route::resource('writers', 'WriterController');
    Route::resource('posts', 'PostController');
});

Route::get('/','SiteController@home');
Route::get('/posts/{post}','SiteController@postsByWriter');
Route::get('/writers/{writer}/posts','SiteController@postsByWriter');