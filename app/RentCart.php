<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentCart extends Model
{
    public function rentdetails()
    {
    	return $this->hasMany(RentCartDetail::class, 'cart_id', 'user_id');
    }
    // public function user(){

    // return $this->belongsTo(User::class, 'user_id');

    // }
}
