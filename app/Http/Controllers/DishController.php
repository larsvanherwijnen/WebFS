<?php

namespace App\Http\Controllers;

class DishController extends Controller
{
    public function index()
    {
        return view('dishes');
    }
}
