<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class MantenimientoController extends Controller
{
    public function mantenimiento()
    {
    	$categories = Category::has('products')->get();
    	return view('sections.mantenimiento')->with(compact('categories'));
    }
}
