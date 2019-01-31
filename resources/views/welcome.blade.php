@extends('layouts.app')

@section('title','Bienvenido a INTERMAQ')

@section('body-class', 'landing-page')
@section('styles')
    <style>
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }
        .row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }
        .tt-query {

            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
          color: #999
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 222px;
          margin-top: 4px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;

        }

        .tt-suggestion p {
          margin: 0;
        }
    </style>
@endsection
@section('content')
<div class="header header-filter" style="background-image: url('/img/examples/tractor.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">Bienvenido a intermaq</h1>
                        <h4>¿Necesitas renta de maquinaria para tu obra? Tambien vendemos maquinarias y damos mantenimiento a diversas maquinas.</h4>
                        <br />
                        <a href="#" class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i> Mira alguno de nuestros productos
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <div class="container">
                

                <div class="section text-center">
                    <h2 class="title">Visita nuestras categorias</h2>
                    
                    <form action="{{ url('/search') }}" method="get" class="form-inline">
                        <input type="text" placeholder="Que producto buscas?" class="form-control" name="query" id="search">
                        <button type="submit" class="btn btn-primary btn-just-icon" >
                            <i class="material-icons">search</i>
                        </button>
                    </form>
                    <div class="team">
                        <h2 class="title">Categorias de maquinaria en venta</h2>
                        <div class="row">

                            @foreach ($categories as $category)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoria {{ $category->name }}" class="img-raised img-circle">
                                    <h4 class="title">
                                        <a href="{{ url('/categories/'.$category->id) }}">
                                            {{  $category->name }} 
                                        </a>
                                        <br/>
                                        <small class="text-muted">{{ $category->category_name }}</small>
                                    </h4>
                                    <p class="description">{{ $category->description }}</p>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>      
                    </div>

                    <div class="team">
                        <h2 class="title">Categorias de maquinaria en renta</h2>
                        <div class="row">

                            @foreach ($rents as $rent)
                            <div class="col-md-4">
                                <div class="team-player card">
                                    <img src="{{ $rent->featuredImageUrl }}" alt="Imagen representativa de la categoria " class="img-raised img-circle">
                
                                    <h4 class="title">
                                       <a href="{{ url('/rents/'.$rent->id) }}">{{ $rent->name }}</a>  <br>
                                        <small class="text-muted">{{ $rent->rentcategory['name'] }} </small>
                                    </h4>
                                    <p class="description">{{ $rent->description }}</p>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{-- <div class="text-center">
                            {{ $rents->links() }}
                        </div> --}}
                
                    </div>

                </div>

                    {{-- <div class="team">
                        <h2 class="title">Productos en renta</h2>
                        <div class="row">

                            @foreach ($product_rents as $productrent)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <img src="" alt="Imagen representativa de la categoria " class="img-raised img-circle">
                                    <h4 class="title">
                                        {{ $productrent->name }} <br>
                                        <small class="text-muted">Model</small>
                                    </h4>
                                    <p class="description">{{ $productrent->description }}</p>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                
                    </div> --}}

                </div>


                <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center title">¿Necesitas alguna cotizacion?</h2>
                            <h4 class="text-center description">Registrate para poder hacernos una consulta acerca de algun producto en especifico, asi como tambien si necesitas alguna cotizacion de los diferentes productos con los que contamos.
                            Nosotros nos comunicaremos contigo a la brevedad posible.</h4>
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Correo electronico</label>
                                            <input type="email" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Tu mensaje</label>
                                    <textarea class="form-control" rows="4" required=""></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4 text-center">
                                        <button class="btn btn-primary btn-raised">
                                            ENVIAR CONSULTA
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

@include('includes.footer')  
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function() {
            //
            var products = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch:{ 
                    url:'{{ url('/products/json') }}',
                    cache:false } 
                });

            // inicializar typeahead sobre nuestro input de busqueda
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },{
              name: 'products',
              source: products

            })
        });
    </script>
@endsection
