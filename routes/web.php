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
Auth::routes(['verify' => true]);
Route::get('/' , "HomeController@index");
Route::resource('home' , "HomeController");
Route::get('/select',"HomeController@select")->name('select');
Route::get('/logout' , function(){
	auth()->logout();
	return redirect('/');
});

// Backend
Route::resource('admin' , "AdminController");
Route::post('/add_role' , "AdminController@add_role")->name('admin.add_role');
