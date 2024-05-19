<?php


use App\Http\Controllers\api\DishesController;
use App\Http\Controllers\api\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('dishes', DishesController::class);
Route::apiResource('orders', OrderController::class)->only(['store']);
