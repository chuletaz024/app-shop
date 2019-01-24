<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductRent;
use App\Category;

class RentController extends Controller
{
    public function rent()
    {
    	$categories = Category::has('products')->get();

    	$products = ProductRent::all(); //para jalar todos los productos en la varibale
    	return view('sections.rent')->with(compact('products','categories'));
    }
}
