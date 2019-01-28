<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentImage extends Model
{
    // $rentImage->rent
    public function rent()
    {
    	return $this->belongsTo(Rent::class,'rent_id');
    }
    public function getUrlAttribute()
    {
    	if (substr($this->image, 0, 4) === "http") {
    		return $this->image;
    	}
    	return '/images/productrents/'.$this->image;
    }
}
