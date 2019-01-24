<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories')); //listado
    }
    public function create()
    {
        $categories = Category::has('products')->get();
    	return view('admin.categories.create')->with(compact('categories'));;
    }
     public function store(Request $request)
    {
    	//validar los datos 
    	$messages = [
    		'name.required'=>'Ees necesario ingresar un nombre para la categoria',
    		'name.min'=>'El nombre de la categoria debe tener al menos 3 caracteres',
    		'description.max'=>'La descripcion corta solo admite hasta 250 caracteres',
    	];
    	$rules = [
    		'name'=>'required|min:3',
    		'description'=>'max:250',
    		
    	];
    	$this->validate($request, $rules, $messages);
    	//Registrar el nuevo producto en la bd
    	//dd($request->all());
    	Category::create($request->all()); //asignacion masiva

    	return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
    	//return "Mostrar aqui el form de edcion para el producto con id:  $id";
        $categories = Category::has('products')->get();
    	return view('admin.categories.edit')->with(compact('category','categories')); //form de edicion
    }
     public function update(Request $request, Category $category)
    {
    	$messages = [
    		'name.required'=>'Ees necesario ingresar un nombre para la categoria',
    		'name.min'=>'El nombre de la categoria debe tener al menos 3 caracteres',
    		'description.max'=>'La descripcion corta solo admite hasta 250 caracteres',
    	];
    	$rules = [
    		'name'=>'required|min:3',
    		'description'=>'max:250',   		
    	];
    	$this->validate($request, $rules, $messages);
    	$category->update($request->all());
    	
    	return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
    	
    	$category->delete(); //DELETE

    	return back();
    }
}
