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

Route::get('/', function () {
    return view('create');
});

//Route::resource('users_info','UsersInfoController');

Route::post('/users_info/store','UsersInfoController@store');

Route::get('/users_info/index','UsersInfoController@index');

Route::get('/users_info/delete/{id}' , 'UsersInfoController@delete');

Route::get('/users_info/edit/{id}' , 'UsersInfoController@edit');

Route::post('/users_info/update','UsersInfoController@update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
