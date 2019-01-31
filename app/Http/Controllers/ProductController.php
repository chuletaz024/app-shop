<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\RentCategory;

class ProductController extends Controller
{
    public function show($id)
    {
        $rents = RentCategory::get();
        $categories = Category::has('products')->get();
    	$product = Product::find($id);
    	$images = $product->images;

    	$imagesLeft = collect();
    	$imagesRight = collect();
    	foreach ($images as $key => $image) {
    		if ($key%2==0) 
    			$imagesLeft->push($image);
    		else
    			$imagesRight->push($image);
    		}
    	return view('products.show')->with(compact('product','imagesLeft', 'imagesRight','categories', 'rents'));
    }
    	
}

