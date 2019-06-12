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


Route::get('/', 'GuestController@index');
Route::get('/booking', 'GuestController@booking');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@bookings')->name('bookings');
Route::get('/add_room', 'HomeController@add_room')->name('add_room');

Route::post('/rooms/save', 'RoomController@create');
Route::get('/rooms', 'RoomController@index');
