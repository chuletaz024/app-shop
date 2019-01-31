<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RentCartDetail;

class RentCartDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function store(Request $request)
    {
    	$rentCartDetail = new RentCartDetail();
    	$rentCartDetail->cart_id = auth()->user()->rentcart->id;
    	$rentCartDetail->product_id = $request->product_id;
    	$rentCartDetail->quantity = $request->quantity;
    	$rentCartDetail->save();
    	$notification = 'El producto se ha cargado a tu carrito exitosamente.';
    	return back()->with(compact('notification'));

    	return back();

    }
    public function destroy(Request $request)
    {
        $rentCartDetail = RentCartDetail::find($request->cart_detail_id);
        if ($rentCartDetail->cart_id == auth()->user()->rentcart->id) 
            $rentCartDetail->delete();
        
        $notification = 'El producto se ha eliminado del carrito de compras.';
        return back()->with(compact('notification'));

    }
}
