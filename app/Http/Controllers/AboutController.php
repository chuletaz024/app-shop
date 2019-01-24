<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AboutController extends Controller
{
    public function about()
    {
    	$categories = Category::has('products')->get();
    	return view('sections.about')->with(compact('categories'));
    }
}
