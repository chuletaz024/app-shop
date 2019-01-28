<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentCategory extends Model
{
    //$category->rents 
    public function rents()
    {
    	return $this->hasMany(Rent::class, 'category_id');
    }
}
