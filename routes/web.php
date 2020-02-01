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

Route::get('/', 'PostController@index');
Route::get('/view/{id}', 'PostController@show')->name('new');//передаем параметр id форме
Route::get('/view/delete/{id}', 'CommentController@delete')->name('delete_comment');//передаем параметр id форме
Route::get('/view', 'CommentController@index');
Route::get('/admintable', 'PostController@index_admin')->name('admintable');
Route::get('/admintable/{id}', 'PostController@show_admin')->name('edit_new');//передаем параметр id форме
Route::post('/admintable/{id}', 'PostController@edit');//передаем параметр id форме
Route::get('/create-new', 'PostController@show_create_new')->name('create_new');//передаем параметр id форме
Route::get('/admintable/delete/{id}', 'PostController@delete')->name('delete_new');//передаем параметр id форме

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
