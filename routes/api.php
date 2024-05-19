<?php


use App\Http\Controllers\api\DishesController;
use Illuminate\Support\Facades\Route;


Route::get('dishes', DishesController::class);
