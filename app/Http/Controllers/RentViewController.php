<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\ProductRent;
use App\Category;
// pruebas con Rent
use App\Rent;
use App\RentCategory;

class RentViewController extends Controller
{
    public function rent()
    {
    	$categories = Category::has('products')->get();
    	$rents = RentCategory::get();
    	$rents = Rent::paginate(9); //para jalar todos los productos en la varibale
    	return view('sections.rent')->with(compact('rents','categories'));
    }
}
