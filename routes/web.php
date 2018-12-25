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


Route::get('/logout' , function(){
	auth()->logout();
	return redirect('/');
});
Route::get('/book/{id}' , "BookController@detail")->name('detail');

Route::get('/player' , "StreamController@test")->name('test');
//Audio Streaming
Route::get('/stream/{token}/{id}' , "StreamController@play")->name('stream');
Route::get('/select/',"StreamController@select")->name('select');
// Backend
Route::resource('admin' , "AdminController");
Route::post('/add_role' , "AdminController@add_role")->name('admin.add_role');

