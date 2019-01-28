<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rent;
use App\Category;
use App\RentImage;
use File;

class RentImageController extends Controller
{
    public function index($id)
    {
    	$categories = Category::has('products')->get();
    	$rent = Rent::find($id);
    	$rentimages = $rent->rentimages()->orderBy('featured','desc')->get();
    	return view('admin.products.imagerent.index')->with(compact('rent','rentimages','categories'));

    }
    public function store(Request $request, $id)
    {
    	//Guardar la imagen en nuestro proyecto
    	$file = $request->file('photo');
    	$path = public_path().'/images/productrents';
    	$fileName = uniqid().$file->getClientOriginalName();
    	$moved = $file->move($path,$fileName);

    	//crear un registro en la tabla product_images
    	if ($moved) {
    		$productImage = new RentImage();
	    	$productImage->image = $fileName;
	    	//$productImage->featured = false;
	    	$productImage->product_id = $id;
	    	$productImage->save(); //INSERT
    	}
    	
    	return back();
    }
    public function destroy(Request $request, $id)
    {
    	//eliminar el archivo
    	$productImage = RentImage::find($request->image_id);
    	if (substr($productImage->image, 0, 4) === "http") {
    		$deleted=true;
    	}else {
    		$fullPath = public_path().'/images/productrents/'.$productImage->image;
    		$deleted = File::delete($fullPath);
    	}
    	//eliminar el regustro de la img en la bd
    	if ($deleted) {
    		$productImage->delete();
    	}
    	return back();
    }
    public function select($id, $image)
    {
        RentImage::where('product_id', $id)->update([

        ]);
        $productImage = RentImage::find($image);
        $productImage->featured = true;
        $productImage->save();

        return back();
    }
}
