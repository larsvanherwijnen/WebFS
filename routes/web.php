<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TabletController;
use App\Http\Middleware\TabletIdentification;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::get('/menu', [MenuController::class, 'download'])->name('menu.download');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::view('/', 'pages.checkout')->name('checkout');
    Route::view('/sales', 'pages.sales')->name('sales');
    Route::get('/dishes', \App\Livewire\ListDishes::class)->name('dishes');
    Route::get('/dishes/create', \App\Livewire\CreateDish::class)->name('dishes.create');
    Route::get('/dishes/edit/{dish}', \App\Livewire\UpdateDish::class)->name('dishes.edit');
});

Route::group([
    'prefix' => 'tablet',
    'middleware' => TabletIdentification::class,
], function () {
    Route::get('/', [TabletController::class, 'index'])->name('tablet.index');
});

Route::get('/identify', [TabletController::class, 'identify'])->name('tablet.identify');
Route::post('/identify', [TabletController::class, 'identifyStore'])->name('tablet.identify.store');

Route::view('/login', 'pages.auth.login')->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
