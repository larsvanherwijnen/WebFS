<?php

namespace App\Http\Controllers\api;

use App\Enums\OrderStatuses;
use App\Enums\OrderTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderLine;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class SaleController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();

        $sales = OrderLine::with('dish')->whereBetween('created_at', [$startDate, $endDate])->get();

        $total = $sales->sum(function ($sale) {
            return $sale->dish->price * $sale->quantity;
        });

        $sales =  $sales->map(function ($sale) {
            return [
                'date' => $sale->created_at,
                'dish' => $sale->dish->name,
                'quantity' => $sale->quantity,
                'price' => $sale->dish->priceFormatted,
            ];
        });



        $tax = $total * 0.09;

        $data = collect([
            'total' => Number::currency($total, 'EUR', 'nl'),
            'tax' => Number::currency($tax, 'EUR', 'nl'),
            'net' => Number::currency($total - $tax, 'EUR', 'nl'),
            'sales' => $sales
        ]);

        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        $order = Order::create([
            'order_type' => OrderTypes::TakeOut,
            'order_status' => OrderStatuses::Pending
        ]);

        $orderlines = collect($request->items)->map(function ($item) {
            return [
                'dish_id' => $item['id'],
                'quantity' => $item['quantity'],
                'note' => $item['note']
            ];
        });

        $order->orderLines()->createMany($orderlines);


        return response()->json(['message' => 'Order created successfully'], 201);
    }


    /**
     * Display the specified resource.
     */
    public function mostUsedNotes(): JsonResponse
    {
        $notes = OrderLine::select('note')->whereNotNull('note')->groupBy('note')->orderByRaw('COUNT(*) DESC')->limit(5)->get();

        return response()->json($notes);
    }
}
