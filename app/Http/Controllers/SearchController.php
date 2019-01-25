<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show(Request $request)
    {
    	$query = $request->input('query');
    	$products = Product::where('name','like',"%$query%")->paginate(5);
    	//si la busqueda devuelve solo 1 resultado se compara el id de ese producto y lo redirige a la pagina del mismo
    	if ($products->count() == 1) {
    		$id = $products->first()->id;
    		return redirect("products/$id"); // 'products/'.$id
    		# code...
    	}
    	return view('search.show')->with(compact('products', 'query'));

    }
    public function data()
    {
    	$products = Product::pluck('name');
    	return $products;
    }
}
