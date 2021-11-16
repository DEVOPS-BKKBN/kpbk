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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('welcome');

Auth::routes();

Route::get('provinces', 'DependentDropdownController@provinces')->name('provinces');
Route::get('kabkota', 'DependentDropdownController@kabkota')->name('kabkota');

Route::get('cities', 'DependentDropdownController@cities')->name('cities');
Route::get('districts', 'DependentDropdownController@districts')->name('districts');
Route::get('villages', 'DependentDropdownController@villages')->name('villages');


Route::get('dashboard', 'HomeController@index')->name('home');
Route::get('pricing', 'PageController@pricing')->name('page.pricing');
Route::get('lock', 'PageController@lock')->name('page.lock');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('category', 'CategoryController', ['except' => ['show']]);
    Route::resource('tag', 'TagController', ['except' => ['show']]);
    Route::resource('item', 'ItemController', ['except' => ['show']]);
    Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('kategori', 'KategoriController', ['except' => ['show']]);
    Route::resource('kebijakan', 'KebijakanController', ['except' => ['show']]);
    Route::resource('viewkebijakan', 'ViewKebijakanController', ['except' => ['show']]);
    Route::resource('viewKategori', 'ViewKategoriController', ['except' => ['show']]);
    Route::resource('transaksi', 'TransaksiController', ['except' => ['show']]);


    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);


});




