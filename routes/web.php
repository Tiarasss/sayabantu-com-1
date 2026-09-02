<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | PESANAN
    |--------------------------------------------------------------------------
    */

    Route::get('/pesanan', function () {
        return view('admin.pesanan.index');
    })->name('pesanan');


    /*
    |--------------------------------------------------------------------------
    | DETAIL PESANAN
    |--------------------------------------------------------------------------
    */

    Route::get('/pesanan/{id}', function ($id) {

        return view('admin.pesanan.detail', [
            'id' => $id
        ]);

    })->name('pesanan.detail');


    /*
    |--------------------------------------------------------------------------
    | PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    Route::get('/pembayaran', function () {
        return view('admin.pembayaran.index');
    })->name('pembayaran');

    Route::get('/pembayaran/{id}', function ($id) {

    return view('admin.pembayaran.detail', [
        'id' => $id
    ]);

})->name('pembayaran.detail');


    /*
    |--------------------------------------------------------------------------
    | KONFLIK
    |--------------------------------------------------------------------------
    */

    Route::get('/konflik', function () {
        return view('admin.konflik.index');
    })->name('konflik');

});