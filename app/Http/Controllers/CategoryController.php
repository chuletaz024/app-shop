<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\RentCategory;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
    	$rents = RentCategory::get();
    	$categories = Category::has('products')->get();
    	$products = $category->products()->paginate(10);
    	return view('categories.show')->with(compact('category', 'products','categories','rents'));
    }
}
