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

Route::get('/check', function () {
    return view('Backend.Booking.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/cars', 'CarController@index')->name('cars');
Route::get('admin/cars/create', 'CarController@create')->name('cars.create');
Route::post('admin/cars/store', 'CarController@store')->name('cars.store');
Route::get('admin/cars/edit/{id}', 'CarController@edit')->name('cars.edit');
Route::post('admin/cars/update/{id}', 'CarController@update')->name('cars.update');
Route::get('admin/cars/delete/{id}', 'CarController@destroy')->name('cars.delete');
Route::get('admin/cars/show/{id}', 'CarController@show')->name('cars.show');
