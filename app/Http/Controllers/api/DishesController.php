<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DishResource;
use App\Models\Dish;
use App\Models\DishType;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): string
    {

        $filters = $request->get('filters', []);
        $search = $request->get('search', '');

        // Query dishes based on filters and search
        $query = Dish::query();

        // Filter dishes by type
        if (! empty($filters)) {
            $query->whereIn('dish_type_id', $filters);
        }

        // Search dishes by name
        if (! empty($search)) {
            $query->whereAny(['name', 'menu_number'], 'like', '%'.$search.'%');
        }

        // Get dishes
        $dishes = $query->get();

        $dishesTypes = DishType::all();

        // Return dishes and types as JSON.
        return json_encode([
            'dishes' => DishResource::collection($dishes),
            'dishTypes' => $dishesTypes,
        ]);
    }
}
