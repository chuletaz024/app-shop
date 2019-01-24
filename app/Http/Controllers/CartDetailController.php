<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
        //cada cliente tiene un carrito de compras activo, solo uno
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

    	$notification = 'El producto se ha cargado a tu carrito exitosamente.';
    	return back()->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
    	$cartDetail = CartDetail::find($request->cart_detail_id);
    	if ($cartDetail->cart_id == auth()->user()->cart->id) 
    		$cartDetail->delete();

    	$notification = 'El producto se ha eliminado del carrito de compras.';
    	return back()->with(compact('notification'));
    }
}