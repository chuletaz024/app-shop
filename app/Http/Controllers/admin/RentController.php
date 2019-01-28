<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rent;
use App\Category;
use App\RentCategory;


class RentController extends Controller
{
    public function index()
    {
    	$categories = Category::has('products')->get();
    	$products = Rent::paginate(10);
    	return view('admin.rents.index')->with(compact('products','categories')); //listado
    }
    public function create()
    {
    	$categories = Category::orderBy('name')->get();
    	return view('admin.rents.create')->with(compact('categories'));

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
    	//Registrar el nuevo producto en la bd
    	//dd($request->all());
    	$product= new Rent();
    	$product->name=$request->input('name');
    	$product->description=$request->input('description');
    	$product->price=$request->input('price');
    	$product->long_description=$request->input('long_description');
        if ($request->category_id == 0)
            $product->category_id = null;
        else
            $product->category_id = $request->category_id;
    	$product->save(); //INSERT

    	return redirect('/admin/rents');

    }
    public function edit($id)
    {
        
    	$categories = Category::orderBy('name')->get();
    	$product = Rent::find($id);
    	return view('admin.rents.edit')->with(compact('product', 'categories')); //form de edicion
    }
     public function update(Request $request, $id)
    {
    	$rules = [
    		'name'=>'required|min:3',
    		'description'=>'required|max:200',
    		'price'=>'required|numeric|min:0'
    		
    	];
    	$this->validate($request, $rules);
    	//Registrar el nuevo producto en la bd
    	//dd($request->all());
    	$product= Rent::find($id);
    	$product->name=$request->input('name');
    	$product->description=$request->input('description');
    	$product->price=$request->input('price');
    	$product->long_description=$request->input('long_description');
        if ($request->category_id == 0)
            $product->category_id = null;
        else
            $product->category_id = $request->category_id;
    	$product->save(); //UPDATE

    	return redirect('/admin/rents');
    }

    public function destroy($id)
    {
    	
    	$product= Rent::find($id);
    	$product->delete(); //DELETE

    	return back();
    }
}
