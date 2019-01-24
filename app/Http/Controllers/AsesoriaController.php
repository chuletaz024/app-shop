<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AsesoriaController extends Controller
{
    public function asesoria()
    {
    	$categories = Category::has('products')->get();
    	return view('sections.asesoria')->with(compact('categories'));
    }
}
