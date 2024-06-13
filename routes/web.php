<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::view('/', 'pages.checkout')->name('checkout');
    Route::view('/sales', 'pages.sales')->name('sales');
    Route::get('/dishes', \App\Livewire\ListDishes::class)->name('dishes');
    Route::get('/dishes/create', \App\Livewire\CreateDish::class)->name('dishes.create');
    Route::get('/dishes/edit/{dish}', \App\Livewire\UpdateDish::class)->name('dishes.edit');
});

Route::view('/login', 'pages.auth.login')->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');


