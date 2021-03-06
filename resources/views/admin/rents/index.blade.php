@extends('layouts.app')

@section('title','Listado de productos en renta')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            
        </div>

        <div class="main main-raised">
            <div class="container">
                

                <div class="section text-center">
                    <h2 class="title">Listado de productos en renta</h2>

                    <div class="team">
                        <div class="row">
                            <a href="{{ url('/admin/rents/create') }}" class="btn btn-primary btn-round">Nuevo producto</a>
                           <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="col-md-2 text-center">Nombre</th>
                                        <th class="col-md-5 text-center">Descripcion</th>
                                        <th class="text-center">Categoria</th>
                                        <th class="text-right">Precio</th>
                                        <th class="text-right">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $productrent)
                                    <tr>
                                        <td class="text-center">{{ $productrent->id }}</td>
                                        <td>{{ $productrent->name }}</td>
                                        <td>{{ $productrent->description }}</td>
                                        <td>{{ $productrent->rent_category_name }}</td>
{{--                                         <td>{{ $productrent->category ? $productrent->rentcategory->name : 'General' }}</td>
 --}}                                        <td class="text-right">&#36; {{ $productrent->price }}</td>
                                        <td class="td-actions text-right">
                                            
                                            <form action="{{ url('/admin/rents/'.$productrent->id) }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <a href="{{ url('/rents/'.$productrent->id) }}" type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                                    <i class="fa fa-info"></i>
                                                </a>
                                                <a href="{{ url('/admin/rents/'.$productrent->id.'/edit') }}" type="button" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ url('/admin/rents/'.$productrent->id.'/images') }}" type="button" rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-simple btn-xs">
                                                    <i class="fa fa-image"></i>
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

                            {{ $products->links() }}
            
                        </div>
                    </div>

                </div>


                
            </div>

        </div>

@include('includes.footer')  
@endsection
