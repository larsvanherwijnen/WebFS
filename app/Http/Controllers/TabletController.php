<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TabletController extends Controller
{
    public function index()
    {
        return view('tablet.index');
    }

    public function identify()
    {
        return view('tablet.identify');
    }

    public function identifyStore(Request $request)
    {
        $request->validate([
            'tablet' => 'required|string',
        ]);

        $tablet = $request->tablet;
        if (Table::where('tabletId', $tablet)->exists()) {
            session()->put('tablet', $tablet);
            return redirect()->route('tablet.index');
        }

        return back()->with('error', 'Tafel sleutel niet gevonden. Probeer opnieuw.');
    }
}
