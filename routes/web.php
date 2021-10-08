<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::prefix('admin')->group(function(){
    Route::get('/', 'PageController@index')->name('home');
    Route::get('/dashboard', 'PageController@dashboard')->name('admin.dashboard');
    Route::get('/main', 'MainPagesController@index')->name('admin.main');
    Route::get('/services', 'PageController@services')->name('admin.services');
    Route::get('/portfolio', 'PageController@portfolio')->name('admin.portfolio');
    Route::get('/about', 'PageController@about')->name('admin.about');
    Route::get('/contact', 'PageController@contact')->name('admin.contact');
    Route::put('/main', 'MainPagesController@update')->name('admin.main.update');
    Route::get('/services/create', 'ServicePagesController@create')->name('admin.services.create');
    Route::post('/services/create', 'ServicePagesController@store')->name('admin.services.store');
    Route::get('/services/list', 'ServicePagesController@list')->name('admin.services.list');
    Route::get('/services/edit/{id}', 'ServicePagesController@edit')->name('admin.services.edit');
    Route::post('/services/update/{id}', 'ServicePagesController@update')->name('admin.services.update');
    Route::delete('/services/destroy/{id}', 'ServicePagesController@destroy')->name('admin.services.destroy');

    Route::get('/portfolios/create', 'PortfolioPagesController@create')->name('admin.portfolios.create');
    Route::post('/portfolios/create', 'PortfolioPagesController@store')->name('admin.portfolios.store');
    Route::get('/portfolios/list', 'PortfolioPagesController@list')->name('admin.portfolios.list');
    Route::get('/portfolios/edit/{id}', 'PortfolioPagesController@edit')->name('admin.portfolios.edit');
    Route::post('/portfolios/update/{id}', 'PortfolioPagesController@update')->name('admin.portfolios.update');
    Route::delete('/portfolios/destroy/{id}', 'PortfolioPagesController@destroy')->name('admin.portfolios.destroy');
    
});

// Route::get('/', 'PageController@index')->name('home');
// Route::get('/admin/dashboard', 'PageController@dashboard')->name('admin.dashboard');
// Route::get('/admin/main', 'MainPagesController@index')->name('admin.main');
// Route::get('/admin/services', 'PageController@services')->name('admin.services');
// Route::get('/admin/portfolio', 'PageController@portfolio')->name('admin.portfolio');
// Route::get('/admin/about', 'PageController@about')->name('admin.about');
// Route::get('/admin/contact', 'PageController@contact')->name('admin.contact');
// Route::put('/admin/main', 'MainPagesController@update')->name('admin.main.update');
// Route::get('/admin/services/create', 'ServicePagesController@create')->name('admin.services.create');
// Route::post('/admin/services/create', 'ServicePagesController@store')->name('admin.services.store');
// Route::get('/admin/services/list', 'ServicePagesController@list')->name('admin.services.list');
// Route::get('/admin/services/edit/{id}', 'ServicePagesController@edit')->name('admin.services.edit');
// Route::post('/admin/services/update/{id}', 'ServicePagesController@update')->name('admin.services.update');
// Route::delete('/admin/services/destroy/{id}', 'ServicePagesController@destroy')->name('admin.services.destroy');

Auth::routes();

//  Route::get('/home', 'HomeController@index')->name('home');
