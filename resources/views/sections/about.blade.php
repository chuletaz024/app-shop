@extends('layouts.app')

@section('title','Bienvenido a INTERMAQ')

@section('content')
<div class="header header-filter" style="background-image: url('/img/examples/tractor.jpg');">
            
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center section-landing">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title">Acerca de INTERMAQ</h2>
                            <h5 class="description">Somos una empresa con varios años en el mercado, damos el mejor trato a nuestros clientes.
                            Tambien contamos con transporte de maquinaria hasta el lugar que lo solicites asi como tenemos gente capacitada para el manejo de las diferentes maquinarias</h5>
                        </div>
                    </div>

                    <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title">Renta</h4>
                                    <p>Contamos con diversos productos para renta, entre ellos, maquinaria pesada para construccion de edificios y/o carreteras.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title">Venta</h4>
                                    <p>Tenemos a la venta diversas maquinas que te pueden servir para tus obras, contamos con la mejor garantia ante fallas.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">fingerprint</i>
                                    </div>
                                    <h4 class="info-title">Mantenimiento</h4>
                                    <p>¿Tu maquinaria hace ruidos extraños? ¿Se calienta o no rinde lo que deberia? nosotros damos mantenimiento preventivo y correctivo a diversas maquinas, contactanos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Correo electronico</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Tu mensaje</label>
                                    <textarea class="form-control" rows="4"></textarea>
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
