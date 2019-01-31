<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentCategory extends Model
{
	protected $fillable = ['name','description']; //asignacion masiva mediante un request
    //$category->rents 
    public function rents()
    {
    	return $this->hasMany(Rent::class, 'category_id');
    }
    public function getFeaturedImageUrlAttribute()
    {
    	$featuredProduct = $this->rents()->first();
    	return $featuredProduct->featured_image_url;
    }
}
