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


Route::get('/', 'BookingController@index');

Route::get('/booking', 'BookingController@booking')->middleware('auth');

Route::post('/booking/fetchTotal', 'BookingController@fetchTotal')->middleware('auth');
Route::get('/admin_booking', 'BookingController@admin_booking')->name('admin_booking')->middleware('auth');
Route::post('/admin_booking', 'BookingController@admin_booking_save')->middleware('auth');
Route::post('/booking', 'BookingController@save')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@bookings')->name('bookings');;
Route::get('/add_room', 'HomeController@add_room')->name('add_room');

Route::post('/rooms/save', 'RoomController@create')->middleware('auth');;
Route::get('/rooms', 'RoomController@index')->middleware('auth');;
Route::get('/rooms/fetch', 'RoomController@fetch')->middleware('auth');;
Route::post('/rooms/free', 'RoomController@available')->middleware('auth');;
