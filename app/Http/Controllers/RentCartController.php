<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentCartController extends Controller
{
    public function update()
    {
    	$rentcart = auth()->user()->rentcart;
    	$rentcart->status =  'Pending';
    	$rentcart->save();

    	$notification = 'Tu pedido se ha registrado correctamente. Te contactaremos pronto via E-mail';
    	return back()->with(compact('notification'));
    }
}
