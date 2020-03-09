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

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/korisnik/show/{productId}', 'ProductController@show')->name('korisnik.show');

Route::get('/kosara', 'KosaraController@index')->name('kosara.index')->middleware('auth');
Route::get('/plati', 'KosaraController@plati')->name('kosara.plati')->middleware('auth');
Route::get('/add_to_cart/{product}', 'KosaraController@dodaj')->name('kosara.dodaj')->middleware('auth');
Route::get('/brisi/{artiklId}', 'KosaraController@brisi')->name('kosara.brisi')->middleware('auth');
Route::get('/update/{artiklId}', 'KosaraController@update')->name('kosara.update')->middleware('auth');

Route::resource('orders', 'OrderController')->middleware('auth');


