<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryRent extends Model
{
	//$category->products
    public function products()
    {
    	return $this->hasMany(ProductRent::class);
    }
}
