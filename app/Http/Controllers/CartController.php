<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; //directiva de la clase carbon
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update()
    {
    	$client = auth()->user();
    	$cart = $client->cart;
    	$cart->status = 'Pending';
    	$cart->order_date = Carbon::now(); //clase de laravel que nos permite manipular fechas "carbon"
    	$cart->save(); //UPDATE

    	$admins = User::where('admin',true)->get(); //obtener a los administradores
    	Mail::to($admins)->send(new NewOrder($client, $cart)); //enviar a todos los administradores el carrito de compras asociado al clientre



    	$notification = 'Tu pedido se ha registrado correctamente. Te contactaremos pronto via email.';
    	return back()->with(compact('notification'));
    }
}
