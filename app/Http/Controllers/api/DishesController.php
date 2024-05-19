<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): string
    {
        return DishResource::collection(Dish::all())->toJson();
    }
}
