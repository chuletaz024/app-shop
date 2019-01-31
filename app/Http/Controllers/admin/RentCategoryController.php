<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\RentCategory;

class RentCategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::has('products')->get();
        $rents = RentCategory::get();
    	$rentcategories = RentCategory::paginate(10);
    	return view('admin.rentcategories.index')->with(compact('rentcategories','categories','rents')); //listado
    }
    public function create()
    {
        $rents = RentCategory::get();
    	$categories = Category::orderBy('name')->get();
    	return view('admin.rentcategories.create')->with(compact('categories','rents'));

    }
    public function store(Request $request)
    {
    	//validar los datos 
    	$messages = [
    		'name.required'=>'Ees necesario ingresar un nombre para el producto',
    		'name.min'=>'El nombre de la categoria debe tener al menos 3 caracteres',
    		'description.required'=>'La descripcion corta es un campo obligatorio',
    		'description.max'=>'La descripcion corta solo admite hasta 200 caracteres'
    		
    	];
    	$rules = [
    		'name'=>'required|min:3',
    		'description'=>'required|max:200',
    		
    		
    	];
    	$this->validate($request, $rules, $messages);
    	//Registrar el nuevo producto en la bd
    	//dd($request->all());
    	RentCategory::create($request->all()); //mass assignment

    	return redirect('/admin/rentcategories');

    }
    public function edit(RentCategory $rentcategories)
    {
        $rents = RentCategory::get();   
    	$categories = Category::orderBy('name')->get();
    	return view('admin.rentcategories.edit')->with(compact('rentcategories', 'categories','rents')); //form de edicion
    }
     public function update(Request $request, RentCategory $rentcategories)
    {
    	$rules = [
    		'name'=>'required|min:3',
    		'description'=>'required|max:200'
    			
    	];
    	$this->validate($request, $rules);
    	//Registrar el nuevo producto en la bd
    	//dd($request->all());
    	$rentcategories->update($request->all());

    	return redirect('/admin/rentcategories');
    }

    public function destroy(RentCategory $rentcategories)
    {
    	
    	$rentcategories->delete(); //DELETE

    	return back();
    }
}
