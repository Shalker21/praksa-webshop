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
Route::resource('product', 'ProductController')->middleware('is_admin');
Route::resource('category', 'CategoriesController')->middleware('is_admin');
Route::get('admin/dodajKategoriju', 'CategoriesController@index')->name('admin.dodajKategoriju')->middleware('is_admin');
// Admin panel
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('admin/store', 'admin\AdminController@dodajArtikl')->name('admin.store')->middleware('is_admin');
Route::get('admin/narudzbe', 'admin\AdminController@narudzbe')->name('admin.narudzbe')->middleware('is_admin');
Route::get('admin/detaljno/{id}', 'admin\AdminController@detaljno')->name('admin.detaljno')->middleware('is_admin');
Route::get('admin/prikaziVrsteArtikala/{id}', 'admin\AdminController@prikaziVrsteArtikala')->name('admin.prikaziVrsteArtikala')->middleware('is_admin');
Route::get('admin/obrisiSingleOrderItem/{id}', 'admin\AdminController@obrisiSingleOrderItem')->name('admin.obrisiSingleOrderItem')->middleware('is_admin');
Route::get('admin/obrisiNarudzbu/{id}', 'admin\AdminController@obrisiNarudzbu')->name('admin.obrisiNarudzbu')->middleware('is_admin');
//Route::get('admin/dodajKategoriju', 'admin\AdminController@dodajKategoriju')->name('admin.dodajKategoriju')->middleware('is_admin');

Route::get('admin/sviArtikli', 'admin\AdminController@sviArtikli')->name('admin.sviArtikli')->middleware('is_admin');
Route::get('admin/korisnici', 'admin\AdminController@korisnici')->name('admin.korisnici')->middleware('is_admin');

Route::get('admin/dodajArtikl', 'admin\AdminController@dodajArtikl')->name('admin.dodajArtikl')->middleware('is_admin');
Route::get('admin/fetch', 'admin\AdminController@fetch')->name('admin.fetch')->middleware('is_admin');
