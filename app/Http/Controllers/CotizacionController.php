<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CotizacionController extends Controller
{
    public function cotizacion()
    {
    	$categories = Category::has('products')->get();
    	return view('sections.cotizacion')->with(compact('categories'));
    }
}
