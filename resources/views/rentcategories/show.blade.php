@extends('layouts.app')

@section('title','INTERMAQ | Categorias')

@section('body-class', 'profile-page')

@section('styles')
    <style>
        .team {
            padding-bottom: 50px;
        }
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .team .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }
        .team .row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }
    </style>
@endsection

@section('content')

<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{ $rentcategory->featured_image_url }}" alt="Imagen representativa de la categoria {{ $rentcategory->name }}" class="img-circle img-responsive img-raised">
                    </div>

                    <div class="name">
                        <h3 class="title">{{ $rentcategory->name }} </h3>
                    </div>
                    @if (session('notification'))
                        <div class="alert alert-success" role="alert">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="description text-center">
                <p>{{ $rentcategory->description }}</p>
            </div>

            <div class="team text-center">
                        <div class="row">
                            @foreach ($rents as $rent)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <img src="{{ $rent->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle">
                                    <h4 class="title">
                                        <a href="{{ url('/rents/'.$rent->id) }}">
                                            {{  $rent->name }} 
                                        </a>
                                    </h4>
                                    <p class="description">{{ $rent->description }}</p>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            {{ $rents->links() }}
                        </div>
                    </div>

           
           
        

        </div>
    </div>
</div>
            <!-- Modal Core -->

   

@include('includes.footer')        
@endsection





