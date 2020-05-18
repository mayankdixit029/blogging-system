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

Auth::routes();
Route::middleware('auth')->group(function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('blogs','BlogController');
Route::get('category','CategoryController@index');
Route::get('category/create','CategoryController@create');
Route::post('category/store','CategoryController@store');
Route::get('category/{id}/show','CategoryController@show');
Route::get('category/{id}/edit','CategoryController@edit');
Route::put('category/{id}/update','CategoryController@update');
Route::delete('category/{id}/delete','CategoryController@delete');



Route::get('blog','BlogController@index');
Route::get('blog/create','BlogController@create');
Route::post('blog/store','BlogController@store');
Route::get('blog/{id}/show','BlogController@show');
Route::get('blog/{id}/edit','BlogController@edit');
Route::put('blog/{id}/update','BlogController@update');
Route::delete('blog/{id}/delete','BlogController@delete');



Route::get('tag','TagController@index');
Route::get('tag/create','TagController@create');
Route::post('tag/store','TagController@store');
Route::get('tag/{id}/show','TagController@show');
Route::get('tag/{id}/edit','TagController@edit');
Route::put('tag/{id}/update','TagController@update');
Route::delete('tag/{id}/delete','TagController@delete');
});