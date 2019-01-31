<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\RentCategory;

class MantenimientoController extends Controller
{
    public function mantenimiento()
    {
    	$rents = RentCategory::get();
    	$categories = Category::has('products')->get();
    	return view('sections.mantenimiento')->with(compact('categories','rents'));
    }
}
