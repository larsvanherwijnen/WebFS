<?php


use App\Http\Controllers\api\DishesController;
use App\Http\Controllers\api\SaleController;
use Illuminate\Support\Facades\Route;


Route::get('dishes', DishesController::class);
Route::apiResource('sales', SaleController::class)->only(['index', 'store']);
Route::post('sales/table', [SaleController::class, 'storeTablet']);
Route::get('sales/exports', [SaleController::class, 'exports']);
Route::get('most-used-notes', [SaleController::class, 'mostUsedNotes']);
