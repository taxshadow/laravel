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

//create
Route::group(['middleware' => 'auth'], function(){
	Route::get('app/home', 'AdminController@index');
	Route::resource('app/indukkategori', 'IndukController');
	Route::resource('app/kategori', 'KategoriController');
	Route::resource('app/artikel', 'ArtikelController');
	Route::resource('app/user', 'UserController');
	Route::get('/app/logout', 'AdminController@getLogout');
	Route::resource('/user/profile', 'ProfilController');
});

Route::group(['middleware' => 'guest'], function(){
Route::get('/login', 'UserController@getLogin');
Route::get('/', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');
Route::get('/register', 'UserController@getRegister');
Route::post('/register', 'UserController@postRegister');
Route::get('/ForgotPassword', 'UserController@getForgot');
Route::get('/register/verify/{confirmationCode}', 'UserController@confirm');
});

Route::resource('/blog', 'BlogController');
Route::get('app/blog/seacrh', 'BlogController@search');

Route::get('/blog/author/{id}', 'BlogController@getAuthor');
Route::get('/blog/kategori/{id}', 'BlogController@getKategori');

Route::get('/error', function(){
	return view('errors.error404');
});