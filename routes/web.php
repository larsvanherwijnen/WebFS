<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});




Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('checkout');
    })->name('checkout');

    Route::get('/sales', function () {
        return view('sales');
    })->name('sales');
});



