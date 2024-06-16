<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use Barryvdh\DomPDF\Facade\Pdf;

class MenuController extends Controller
{
    public function download()
    {
        // Generate a pdf from the pages.menu view
        $dishTypes = DishType::all();
        $dishes = Dish::all();

        $pdf = Pdf::loadView('pages.menu', compact('dishTypes', 'dishes'));

        return $pdf->download('Gouden-Draak_menu.pdf');

    }
}
