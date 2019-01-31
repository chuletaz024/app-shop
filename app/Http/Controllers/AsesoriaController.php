<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\RentCategory;

class AsesoriaController extends Controller
{
    public function asesoria()
    {
    	$rents = RentCategory::get();
    	$categories = Category::has('products')->get();
    	return view('sections.asesoria')->with(compact('categories','rents'));
    }
}
