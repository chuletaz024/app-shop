<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRent extends Model
{
    // $product->category
    public function category()
    {
    	return $this->belongsTo(CategoryRent::class);
    }
    // $product->images
    public function images()
    {
     return $this->hasMany(ProductImageRent::class,'rent_id','category_id'); 
    }
    //accesor para ver la imagen destacada del producto
    public function getFeaturedImageUrlAttribute()
    {
    	$featuredImage = $this->images()->where('featured', true)->first(); //obtener la imagen destacada del producto que estan asociadas a el, se hace con el campo true
        if (!$featuredImage) //si el producto no tiene imagen destacada entonces
            $featuredImage=$this->images()->first(); //se ve la primera imagen del producto
        if ($featuredImage) {  //si buscamos una imagen entonces
            return $featuredImage->url; //regresamos la iamgen destacada
        }

        return '/images/productrents/default.png'; //se muestra la iamgen por defecto si el producto no tiene imagen.
    }
}
