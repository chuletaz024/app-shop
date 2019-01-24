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
                            <h2 class="title">Necesitas asesoria en el area?</h2>
                            <h5 class="description">Anios nos respaldan para brindarte la mejor asesoria en las diferentes areas que lo necesites.
                            Puedes escribirnos a nuestro correo para una asesoria personalizada</h5>
                        </div>
                    </div>

                    <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">build</i>
                                    </div>
                                    <h4 class="info-title">lorem</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cumque architecto hic ab delectus beatae reprehenderit quos modi error, repellendus aliquam quia, quis voluptatem est, magni. Cum enim fuga commodi.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">build</i>
                                    </div>
                                    <h4 class="info-title">lorem</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci odit aut temporibus eveniet assumenda autem, obcaecati maxime consectetur ipsum quisquam, libero nihil, ipsam tempora molestiae repellat vero non id ut!</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">build</i>
                                    </div>
                                    <h4 class="info-title">lorem</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae reprehenderit, saepe veritatis mollitia consequuntur numquam impedit voluptatum voluptatem esse, dolor, quidem recusandae quaerat quam voluptas magni ut alias temporibus quo.</p>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">build</i>
                                    </div>
                                    <h4 class="info-title">lorem</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cumque architecto hic ab delectus beatae reprehenderit quos modi error, repellendus aliquam quia, quis voluptatem est, magni. Cum enim fuga commodi.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">build</i>
                                    </div>
                                    <h4 class="info-title">lorem</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci odit aut temporibus eveniet assumenda autem, obcaecati maxime consectetur ipsum quisquam, libero nihil, ipsam tempora molestiae repellat vero non id ut!</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">build</i>
                                    </div>
                                    <h4 class="info-title">lorem</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae reprehenderit, saepe veritatis mollitia consequuntur numquam impedit voluptatum voluptatem esse, dolor, quidem recusandae quaerat quam voluptas magni ut alias temporibus quo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                


                {{-- <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center title">¿Necesitas asesoria personalizada?</h2>
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

                </div> --}}
            </div>

        </div>

@include('includes.footer')  
@endsection
