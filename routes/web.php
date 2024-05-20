<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');




Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('pages.checkout');
    })->name('checkout');

    Route::get('/sales', function () {
        return view('pages.sales');
    })->name('sales');
});


Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');

Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');



