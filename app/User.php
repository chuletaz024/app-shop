<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function rentcarts()
    {
        return $this->hasMany(RentCart::class);
    }

    //Cart_id
    public function getCartAttribute()
    {
        $cart = $this->carts()->where('status', 'Active')->first();
        if ($cart) 
            return $cart;

            //else 
                $cart = new Cart();
                $cart->status = 'Active';
                $cart->user_id = $this->id;
                $cart->save();

                return $cart;
    }
    public function getRentCartAttribute()
    {
        $rentcart = $this->rentcarts()->where('status', 'Active')->first();
        if ($rentcart) 
            return $rentcart;

            //else 
                $rentcart = new RentCart();
                $rentcart->status = 'Active';
                $rentcart->user_id = $this->id;
                $rentcart->save();

                return $rentcart;
    }
}
