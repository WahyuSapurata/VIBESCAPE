<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'Dashboard@index')->name('home.index');

    Route::get('/', 'Landing@home')->name('home');

    Route::get('/detail-kategori/{params}', 'Landing@detail_kategori')->name('detail-kategori');

    Route::post('/view-home', 'Landing@view_home')->name('view-home');
    Route::post('/view-artikel/{params}', 'Landing@view_artikel')->name('view-artikel');

    Route::get('/detail-artikel/{params}', 'Landing@detail_artikel')->name('detail-artikel');

    Route::get('/search', 'Landing@search')->name('search');

    Route::group(['prefix' => 'login', 'middleware' => ['guest'], 'as' => 'login.'], function () {
        Route::get('/login-akun', 'Auth@show')->name('login-akun');
        Route::post('/login-proses', 'Auth@login_proses')->name('login-proses');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
        Route::get('/dashboard-admin', 'Dashboard@dashboard_admin')->name('dashboard-admin');

        Route::get('/data-user', 'DataUser@index')->name('data-user');
        Route::get('/data-user-get', 'DataUser@get')->name('data-user-get');
        Route::post('/data-user-add', 'DataUser@add')->name('data-user-add');
        Route::get('/data-user-show/{params}', 'DataUser@show')->name('data-user-show');
        Route::post('/data-user-edit/{params}', 'DataUser@edit')->name('data-user-edit');
        Route::delete('/data-user-delete/{params}', 'DataUser@delete')->name('data-user-delete');

        Route::get('/kategori', 'KategoriController@index')->name('kategori');
        Route::get('/kategori-get', 'KategoriController@get')->name('kategori-get');
        Route::post('/kategori-add', 'KategoriController@add')->name('kategori-add');
        Route::get('/kategori-show/{params}', 'KategoriController@show')->name('kategori-show');
        Route::post('/kategori-edit/{params}', 'KategoriController@edit')->name('kategori-edit');
        Route::delete('/kategori-delete/{params}', 'KategoriController@delete')->name('kategori-delete');

        Route::get('/artikel', 'ArtikelController@index')->name('artikel');
        Route::get('/get-artikel', 'ArtikelController@get')->name('get-artikel');
        Route::get('/add-artikel', 'ArtikelController@add')->name('add-artikel');
        Route::post('/store-artikel', 'ArtikelController@store')->name('store-artikel');
        Route::get('/edit-artikel/{params}', 'ArtikelController@edit')->name('edit-artikel');
        Route::post('/update-artikel/{params}', 'ArtikelController@update')->name('update-artikel');
        Route::delete('/delete-artikel/{params}', 'ArtikelController@delete')->name('delete-artikel');
        Route::get('/publikasi-artikel/{params}', 'ArtikelController@update_publikasi')->name('publikasi-artikel');

        Route::post('/add-komentar', 'KomentarController@add')->name('add-komentar');
        Route::get('/button-artikel/{params}', 'ArtikelController@update_tombol')->name('button-artikel');

        Route::get('/header', 'HeaderController@index')->name('header');
        Route::get('/get-header', 'HeaderController@show')->name('get-header');
        Route::get('/add-header', 'HeaderController@create')->name('add-header');
        Route::post('/store-header', 'HeaderController@store')->name('store-header');
        Route::get('/edit-header/{params}', 'HeaderController@edit')->name('edit-header');
        Route::post('/update-header/{params}', 'HeaderController@update')->name('update-header');
        Route::delete('/delete-header/{params}', 'HeaderController@delete')->name('delete-header');

        Route::get('/iklan', 'IklanController@index')->name('iklan');
        Route::get('/get-iklan', 'IklanController@show')->name('get-iklan');
        Route::get('/add-iklan', 'IklanController@create')->name('add-iklan');
        Route::post('/store-iklan', 'IklanController@store')->name('store-iklan');
        Route::get('/edit-iklan/{params}', 'IklanController@edit')->name('edit-iklan');
        Route::post('/update-iklan/{params}', 'IklanController@update')->name('update-iklan');
        Route::delete('/delete-iklan/{params}', 'IklanController@delete')->name('delete-iklan');
    });

    Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function () {
        Route::get('/dashboard-user', 'Dashboard@dashboard_user')->name('dashboard-user');

        Route::get('/kategori-get', 'KategoriController@get')->name('kategori-get');

        Route::get('/artikel', 'ArtikelController@index_user')->name('artikel');
        Route::get('/get-artikel', 'ArtikelController@get')->name('get-artikel');
        Route::get('/add-artikel', 'ArtikelController@add_user')->name('add-artikel');
        Route::post('/store-artikel', 'ArtikelController@store')->name('store-artikel');
        Route::get('/edit-artikel/{params}', 'ArtikelController@edit_user')->name('edit-artikel');
        Route::post('/update-artikel/{params}', 'ArtikelController@update')->name('update-artikel');
        Route::delete('/delete-artikel/{params}', 'ArtikelController@delete')->name('delete-artikel');
        Route::get('/publikasi-artikel/{params}', 'ArtikelController@update_publikasi')->name('publikasi-artikel');

        Route::post('/add-komentar', 'KomentarController@add')->name('add-komentar');
    });

    Route::get('/logout', 'Auth@logout')->name('logout');
});
