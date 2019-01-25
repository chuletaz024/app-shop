@extends('layouts.nav')

@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/image.jpg') }}' ); background-size: cover; background-position: top center;">
<div class="container">
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="card card-signup">
            
                <div class="header header-primary text-center">
                    <h4>{{ __('Recuperar contraseña') }}</h4>
                    
                </div>
                <p class="text-divider">Ingresa tu direccion de E-mail</p>
                <div class="content">

                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif      

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        
                         <input id="email" type="email" placeholder="Email..." class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                         @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif

                    </div>

                    

                    <!-- If you want to add a checkbox to this form, uncomment this code-->

                     
                </div>
                <div class="footer text-center">
                    <button type="submit" class=" btn btn-primary">{{ __('Enviar link para restablecer contraseña') }}</a>
                </div>
                
               
            </form>
        </div>
    </div>
</div>
</div>

    @include('includes.footer')  

        </div>
@endsection
