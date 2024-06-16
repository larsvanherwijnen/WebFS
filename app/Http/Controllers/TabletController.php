<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use App\Models\Table;
use Illuminate\Http\Request;

class TabletController extends Controller
{
    public function index()
    {
        $tabletId = session()->get('tablet');
        $table = Table::where('tabletId', $tabletId)->first();

        if (! $tabletId or ! $table) {
            return view('tablet.identify')->with('error', 'Tafel niet gevonden. Probeer opnieuw.');
        }
        if ($table) {
            $dishes = Dish::all();
            $dishTypes = DishType::all();

            return view('tablet.index', compact('table', 'dishes', 'dishTypes'));
        }
    }

    public function identify()
    {
        return view('tablet.identify');
    }

    public function unIdentify()
    {
        session()->forget('tablet');

        return redirect()->route('tablet.identify');
    }

    public function identifyStore(Request $request)
    {
        $request->validate([
            'tablet' => 'required|string',
        ]);

        $tablet = $request->tablet;
        if (Table::where('tabletId', $tablet)->exists()) {
            session()->put('tablet', $tablet);
            // also put tablet in the cookie
            cookie()->queue('tablet', $tablet);

            return redirect()->route('tablet.index');
        }

        return back()->with('error', 'Tafel sleutel niet gevonden. Probeer opnieuw.');
    }
}
