@extends('layouts.app')

@section('title','INTERMAQ | Dashboard')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            
        </div>

        {{-- <div class="main main-raised">
            <div class="container">
                
                <div class="section">
                    <h2 class="title text-center">Dashboard</h2>
                    @if (session('notification'))
                        <div class="alert alert-success" role="alert">
                            {{ session('notification') }}
                        </div>
                    @endif
                    <ul class="nav nav-pills nav-pills-primary" role="tablist">
                        <li class="active">
                            <a href="#dashboard" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i>
                                Carrito de compras
                            </a>
                        </li>
                        
                        <li>
                            <a href="#tasks" role="tab" data-toggle="tab">
                                <i class="material-icons">list</i>
                                Pedidos realizados
                            </a>
                        </li>
                    </ul>
                    
                    <hr>
                    <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th class="">Precio</th>
                                <th class="">Cantidad</th>
                                <th>Subtotal</th>
                                <th class="">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->cart->details as $detail)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ $detail->product->featured_image_url }}" height="50">
                                </td>
                                <td>
                                    <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                                </td>       
                                <td class="">&#36; {{ $detail->product->price }}</td>
                                <td> {{ $detail->quantity }}</td>
                                <td>$ {{ $detail->quantity * $detail->product->price }}</td>
                                <td class="td-actions ">
                                    
                                    <form action="{{ url('/cart') }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">

                                        <a href="{{ url('/products/'.$detail->product->id) }}" type="button" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a> 
                                        <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <p>
                        <strong>Importe a pagar: </strong> {{ auth()->user()->cart->total }} 
                    </p>
                    <div class="text-center">
                        <form action="{{ url('/order') }}" method="post">
                            @csrf
                            <button class="btn btn-primary btn-round">
                                <i class="material-icons">done</i> Realizar pedido
                            </button>
                            
                        </form>
                        
                    </div>

                    
                </div>  
            </div>
        </div> --}}

        <div class="main main-raised">
            <br><br>
            <div class="container">
                <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            <div class="profile-tabs">
                                <div class="nav-align-center">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="active">
                                            <a href="#studio" role="tab" data-toggle="tab">
                                                <i class="material-icons">dashboard</i>
                                                Carrito de venta
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#work" role="tab" data-toggle="tab">
                                                <i class="material-icons">list</i>
                                                Carrito de renta
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#pedido" role="tab" data-toggle="tab">
                                                <i class="material-icons">list</i>
                                                Pedidos realizados
                                            </a>
                                        </li>
                                        
                                    </ul>

                                    <div class="tab-content gallery">
                                        <div class="tab-pane active " id="studio">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr>
                                                    @if (session('notification'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ session('notification') }}
                                                        </div>
                                                    @endif
                                                    <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos</p>
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Nombre</th>
                                                            <th class="">Precio</th>
                                                            <th class="">Cantidad</th>
                                                            <th>Subtotal</th>
                                                            <th class="">Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach (auth()->user()->cart->details as $detail)
                                                        <tr>
                                                            <td class="text-center">
                                                                <img src="{{ $detail->product->featured_image_url }}" height="50">
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                                                            </td>       
                                                            <td class="">&#36; {{ $detail->product->price }}</td>
                                                            <td> {{ $detail->quantity }}</td>
                                                            <td>$ {{ $detail->quantity * $detail->product->price }}</td>
                                                            <td class="td-actions ">
                                                                
                                                                <form action="{{ url('/cart') }}" method="post">
                                                                    @csrf
                                                                    {{ method_field('DELETE') }}
                                                                    <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">

                                                                    <a href="{{ url('/products/'.$detail->product->id) }}" type="button" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                                                        <i class="fa fa-info"></i>
                                                                    </a> 
                                                                    <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </form>
                                                                
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        
                                                        </tbody>
                                                    </table>
                                                    
                                                    <p>
                                                        <strong>Importe a pagar: </strong> {{ auth()->user()->cart->total }} 
                                                    </p>
                                                    <div class="text-center">
                                                        <form action="{{ url('/order') }}" method="post">
                                                            @csrf
                                                            <button class="btn btn-primary btn-round">
                                                                <i class="material-icons">done</i> Realizar pedido
                                                            </button>
                                                            
                                                        </form>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="tab-pane text-center" id="work">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr>
                                                    @if (session('notification'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ session('notification') }}
                                                        </div>
                                                    @endif
                                                    <p>Tu carrito de compras presenta {{ auth()->user()->rentcart->rentdetails->count() }} productos</p>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Nombre</th>
                                                            <th class="">Precios</th>
                                                            <th class="">Cantidad</th>
                                                            <th>Subtotal</th>
                                                            <th class="">Opciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (auth()->user()->rentcart->rentdetails as $rentdetail)
                                                            <tr>

                                                                <td class="text-center">
                                                                    <img src="{{ $rentdetail->rent->featured_image_url }}" height="50" alt=""></td>
                                                                <td >
                                                                    <a href="{{ url('/rents/'.$rentdetail->id)}} target="_blank"">{{ $rentdetail->rent->name }} </a>
                                                                </td>
                                                                <td class="text-center">&#36; {{ $rentdetail->rent->price }}</td>
                                                                <td>{{ $rentdetail->quantity }}</td>
                                                                <td>&#36; {{ $rentdetail->quantity * $rentdetail->rent->price }}</td>
                                                               
                                                                <td class="td-actions">
                                                                    
                                                                    <form action="{{ url('/rentcart') }}" method="post">
                                                                        @csrf
                                                                        {{ method_field('DELETE') }}

                                                                        <input type="hidden" name="cart_detail_id"value="{{ $rentdetail->id }}">


                                                                        <a href="{{ url('/rents/'.$rentdetail->id) }}" type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                                                            <i class="fa fa-info"></i>
                                                                        </a>
                                                                        
                                                                        <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                                                            <i class="fa fa-times"></i>
                                                                        </button>
                                                                    </form>
                                                                    
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                        
                                                    </table>
                                                    <p>
                                                        <strong>Importe a pagar: </strong> {{ auth()->user()->rentcart->total }} 
                                                    </p>
                                                    <div class="text-center">
                                                        <form action="{{ url('/rentorder') }}" method="post">
                                                            @csrf
                                                            <button class="btn btn-primary btn-round">
                                                                <i class="material-icons">done</i> Realizar pedido
                                                            </button>
                                                            
                                                        </form>
                                                    
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                        <div class="tab-pane text-center" id="pedido">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>nomas</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>jaja</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End Profile Tabs -->
                        </div>
                    </div>
        </div>
            </div>

@include('includes.footer')        
@endsection





