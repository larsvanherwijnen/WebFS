<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Dish;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Dish $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $products)
    {
        //
    }
}
