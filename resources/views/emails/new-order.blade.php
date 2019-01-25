<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nuevo pedido</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<p>Se ha realizad un nuevo pedido!</p>
	<p>Estos son los datos del cliente que realizo el pedido:</p>
	<ul>
		<li>
			<strong>Nombre:</strong>
			{{ $user->name }}
		</li>

		<li>
			<strong>E-mail</strong>
			{{ $user->email }}
		</li>

		<li>
			<strong>Fecha del pedido:</strong>
			{{ $cart->order_date }}
		</li>
	</ul>
	<hr>
	<p>Detalles del pedido</p>
	<ul>
		@foreach ($cart->details as $detail)
		<li>
			{{ $detail->product->name }} X {{ $detail->quantity }} 
			($ {{ $detail->quantity * $detail->product->price }} )
		</li>
		@endforeach
	</ul>
	<p>
		<strong>Importe a pagar: </strong> {{ $cart->total }} 
	</p>
	<hr>

	<p>
		<a href="{{ url('/admin/orders/'.$cart->id) }}">Haz click aqui</a> {{-- liga donde se veran los pedidos por el admin --}}
		para ver mas informacion sobre este pedido.
	</p>
	
</body>
</html>