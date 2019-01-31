<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RentCategory;
use App\Category;



class RentCategoryController extends Controller
{
    public function show(RentCategory $rentcategory)
    {
    	$categories = Category::has('products')->get();
    	$rents = $rentcategory->rents()->paginate(10);
    	return view('rentcategories.show')->with(compact('rentcategory','rents','categories'));
    }
}
