<?php


use App\Http\Controllers\api\DishesController;
use App\Http\Controllers\api\SaleController;
use Illuminate\Support\Facades\Route;


Route::get('dishes', DishesController::class);
Route::apiResource('sales', SaleController::class)->only(['index','store']);
Route::get('most-used-notes', [SaleController::class, 'mostUsedNotes']);
