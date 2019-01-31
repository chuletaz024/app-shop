<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\RentCategory;

class CotizacionController extends Controller
{
    public function cotizacion()
    {
    	$rents = RentCategory::get();
    	$categories = Category::has('products')->get();
    	return view('sections.cotizacion')->with(compact('categories','rents'));
    }
}
