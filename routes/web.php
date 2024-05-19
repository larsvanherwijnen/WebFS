<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('checkout');
});




Route::group(['prefix' => 'cashier', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        dd('Admin');
    })->name('index');

//    Route::resource('products', 'ProductController');
})->middleware('auth');



