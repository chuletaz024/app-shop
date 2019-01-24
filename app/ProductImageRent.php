<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImageRent extends Model
{
    public function product()
    {
    	return $this->belongsTo(ProductRent::class);
    }
    //accesor
    public function getUrlAttribute()
    {
    	if (substr($this->image, 0, 4) === "http") {
			return $this->image;
		}
		return '/images/productrents/' . $this->image;
    }
}
