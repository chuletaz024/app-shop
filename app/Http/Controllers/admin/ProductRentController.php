<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductRent;
use App\Category;
use App\CategoryRent;


class ProductRentController extends Controller
{
    public function index()
    {
    	 $categories = Category::has('products')->get();
    	$products = ProductRent::paginate(10);
    	return view('admin.rents.index')->with(compact('products','categories')); //devuelve la vista con la lista 
    }
    public function create()
    {
    	$categories = Category::has('products')->get();
    	return view('admin.rents.create')->with(compact('categories')); //formulario para poder registrar 
    }
    public function store(Request $request)
    {

    	//validar los datos 
    	$messages = [
    		'name.required'=>'Ees necesario ingresar un nombre para el producto',
    		'name.min'=>'El nombre del producto debe tener al menos 3 caracteres',
    		'description.required'=>'La descripcion corta es un campo obligatorio',
    		'description.max'=>'La descripcion corta solo admite hasta 200 caracteres',
    		'price.required'=>'Es obligatorio definir un precio para el producto',
    		'price.numeric'=>'ingrese un precio valido',
    		'price.min'=>'No se adminten valores negativos'


    	];
    	$rules = [
    		'name'=>'required|min:3',
    		'description'=>'required|max:200',
    		'price'=>'required|numeric|min:0'
    		
    	];
    	$this->validate($request, $rules, $messages);
    	//dd($request->all());
    	$product = new ProductRent();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
    	if ($request->category_id == 0)
            $product->category_id = null;
        else
            $product->category_id = $request->category_id;
    	$product->save(); //INSERT
    	
    	return redirect('/admin/productrents');
    }
    public function edit($id)
    {
    	$categories = Category::has('products')->get();
    	$product = ProductRent::find($id);
    	return view('admin.rents.edit')->with(compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
    	$rules = [
    		'name'=>'required|min:3',
    		'description'=>'required|max:200',
    		'price'=>'required|numeric|min:0'
    		
    	];
    	$this->validate($request, $rules);

    	$product = ProductRent::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
    	if ($request->category_id == 0)
            $product->category_id = null;
        else
            $product->category_id = $request->category_id;
    	$product->save(); //UPDATE

    	return redirect('/admin/productrents');
    }
    public function destroy($id)
    {
    	$product = ProductRent::find($id);

    	$product->delete(); //DELETE borrar el dato 

    	return back();
    }
}
