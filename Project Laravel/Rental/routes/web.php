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

Route::resource('/sewa', 'SewaController');

Route::resource('/mobil', 'MobilController');

Route::get('/mobil/create', 'MobilController@create');

Route::get('/mobil', 'MobilController@index');

Route::post('/mobil', 'MobilController@store');

Route::get('/mobil/{mobil_id}', 'MobilController@show');

Route::get('/mobil/{mobil_id}/edit', 'MobilController@edit');

Route::put('/mobil/{mobil_id}', 'MobilController@update');

Route::delete('/mobil/{mobil_id}', 'MobilController@destroy');


Route::get('/sewa/create', 'SewaController@create');

Route::get('/sewa', 'SewaController@index');

Route::post('/sewa', 'SewaController@store');

Route::get('/sewa/{sewa_id}', 'SewaController@show');

Route::get('/sewa/{sewa_id}/edit', 'SewaController@edit');

Route::put('/sewa/{sewa_id}', 'SewaController@update');

Route::delete('/sewa/{sewa_id}', 'SewaController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
