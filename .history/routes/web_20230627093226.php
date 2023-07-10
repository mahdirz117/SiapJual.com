<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return view('blog/home');
    } else {
        return view('auth/login');
    }
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::post('/authenticate', 'App\Http\Controllers\AuthController@authenticate');

Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

Route::get('/produk', 'App\Http\Controllers\ProdukController@index');

Route::post('/insertproduk', 'App\Http\Controllers\ProdukController@insert');

Route::post('/editproduk', 'App\Http\Controllers\ProdukController@update');

Route::get('/home', function () {
    return view('blog/home');
});

Route::get('/kontak', function () {
    return view('blog/kontak');
});

Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index');

Route::get('/tentang', function () {
    return view('blog/tentang');
});

Route::get('/produk/edit/{id}', 'App\Http\Controllers\ProdukController@edit');
Route::get('/produk/delete/{id}', 'App\Http\Controllers\ProdukController@delete');

Route::get('/tambahproduk', 'App\Http\Controllers\ProdukController@add');
