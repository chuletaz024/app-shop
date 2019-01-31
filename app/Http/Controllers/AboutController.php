<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\RentCategory;

class AboutController extends Controller
{
    public function about()
    {
    	$rents = RentCategory::get();
    	$categories = Category::has('products')->get();
    	return view('sections.about')->with(compact('categories','rents'));
    }
}
