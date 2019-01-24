<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name', 'description'];
	
    // $category->products
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
    	$featuredProduct = $this->products()->first();
    	return $featuredProduct->featured_image_url;
    }

}
