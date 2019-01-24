<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductRent;
use App\Category;
use App\ProductImageRent;
use File;

class ImageRentController extends Controller
{
    public function index($id)
    {
        $categories = Category::has('products')->get();
    	$product = ProductRent::find($id);
    	$images = $product->images;
    	return view('admin.products.imagerent.index')->with(compact('product','images','categories'));
    }
    public function store(Request $request, $id)
    {
    	//guardar la imagen en nuestro proyecto
        //crear 1 registro en la tabla product_image_rents
        $file = $request->file('photo');
        $path = public_path() . '/images/productrents'; //guarda la iamgen en la carpeta public, para tener respaldo
        $fileName = uniqid() . $file->getClientOriginalName(); //la imagen se compone de un id unico con el nombre del archivo que se subio, para evitar que se sobrreescriba la imagen
        $moved = $file->move($path, $fileName); //guardar la imagen en la ruta con el nombre del archivo unico

        if ($moved) {
            $productImage = new ProductImageRent();
            $productImage->image = $fileName;

            $productImage->product_id = $id;
            $productImage->save(); //INSERT

        }
        

        return back();

    }
    public function destroy(Request $request,$id)
    {
    	//eliinar el archivo
        $productImage = ProductImageRent::find($request->input('image_id')); //encontrar la imagen del producto asociaco al id con el find
        if (substr($productImage->image, 0, 4) === "http") { 
            $deleted = true;//si la imagen empieza con http no se elimina, solo cuando no empiece con http 
        } else {
            $fullPath = public_path() . '/images/productrents/' . $productImage->image; //le pasamos la direccion de la imagen en donde se encuentra
            $deleted = File::delete($fullPath); //se elimina la imagen de la direccion
        }
        
        //eliminar el registro de la img en la bd
        if ($deleted) { //
            $productImage->delete(); 
        }
        return back();
        
    }
}
