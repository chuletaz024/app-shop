<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rent;

class RentCartDetail extends Model
{
    public function rent()
    {
    	return $this->belongsTo(Rent::class,'product_id');
    }
}
