<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
    	$categories = Category::has('products')->get();
    	$products = $category->products()->paginate(10);
    	return view('categories.show')->with(compact('category', 'products','categories'));
    }
}
