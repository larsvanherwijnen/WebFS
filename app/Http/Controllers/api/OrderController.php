<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        collect($request->items)->each(function ($item) {
            Sale::create(['dish_id' => $item['id'], 'quantity' => $item['quantity']]);
        });

        return response()->json(['message' => 'Order created successfully'], 201);
    }
}
