<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/timing','TimingController@index');
Route::post('/buyticket' , 'TicketController@buyTicket' );
Route::get('/timing{id}','TimingController@showFilm')->name('showFilm');
Route::post('/ShowPlace' , 'TicketController@ShowPlace');
Route::post('/Showoccupied', 'TicketController@boughtTicket');
