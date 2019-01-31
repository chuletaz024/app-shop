<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    //$rent->rentcategory
    public function rentcategory()
    {
    	return $this->belongsTo(RentCategory::class,'category_id');
    }

    //$$rent->rentimages
    public function rentimages()
    {
    	return $this->hasMany(RentImage::class,'product_id');
    }
    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->rentimages()->where('featured', true)->first();
        if (!$featuredImage) 
            $featuredImage= $this->rentimages()->first();
        if ($featuredImage) {
            return $featuredImage->url;
        }

        return '/images/productrents/default.png';
    }
    public function getRentCategoryNameAttribute()
    {
        if ($this->rentcategory) {
            return $this->rentcategory->name;

        return 'General';
        }
    }



}
