<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryRent;
use App\Rent;
use App\RentCategory;
class TestController extends Controller
{
    public function welcome()
    {

    	$categories = Category::has('products')->get();
    	
    	$rents = RentCategory::get();
    	return view('welcome')->with(compact('categories','rents'));

    	
    }

    
}
 