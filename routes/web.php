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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'PageController@index')->name('home');

Route::get('/admin/dashboard', 'PageController@dashboard')->name('admin.dashboard');

Route::get('/admin/main', 'MainPagesController@index')->name('admin.main');

Route::get('/admin/services', 'PageController@services')->name('admin.services');

Route::get('/admin/portfolio', 'PageController@portfolio')->name('admin.portfolio');

Route::get('/admin/about', 'PageController@about')->name('admin.about');

Route::get('/admin/contact', 'PageController@contact')->name('admin.contact');

Route::put('/admin/main', 'MainPagesController@update')->name('admin.main.update');



Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');
