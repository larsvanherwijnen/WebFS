<?php

namespace App\Http\Controllers;

use App\Models\SaleReport;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __invoke(Request $request)
    {



        return view('pages.sales')->with('exports', $exports);
    }
}
