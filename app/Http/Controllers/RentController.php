<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rent;
use App\Category;
use App\RentCategory;

class RentController extends Controller
{
    public function show($id)
    {
        $rents = RentCategory::get();
    	$categories = Category::has('products')->get();

    	$rent = Rent::find($id);
    	$rentimages = $rent->rentimages;

    	$imagesLeft = collect();
    	$imagesRight = collect();
    	foreach ($rentimages as $key => $rentimage) {
    		if ($key%2==0) 
    			$imagesLeft->push($rentimage);
    		else
    			$imagesRight->push($rentimage);
    	}
    	return view('rents.show')->with(compact('rent','imagesLeft', 'imagesRight','categories','rents'));
    }
}
