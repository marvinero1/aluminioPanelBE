@extends('layouts.main')

@section('content')
<div class="content-wrapper ">
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if( $user->role == 'user')
                    <div class="mb-4 text-center">
                        <div class="avatar-flip">
                            @if( $user->imagen == '')
                            <img img src="/images/default-person.jpg" class="img-thumbnail" alt="Usuario" height="250px"
                                width="250px">
                            @else
                            <img src="/{{ $user->imagen }}" class="img-thumbnail" alt="Usuario" height="250px"
                                width="250px" style="display: block;margin: 0 auto;">
                            @endif
                        </div>
                        <h2 style="text-align: center;">{{ $user->name }}</h2>
                        <h4 style="text-align: center;">{{ $user->ciudad }}, {{ Auth::user()->pais }}</h4><br>
                        <div class="row mb-4">
                           
                            <div class="col-md-6">
                                <h4><strong>Apellido</strong> </h4>
                                <h5>{{ $user->apellido }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h4><strong>Correo Electronico</strong> </h4>
                                <h5>{{ $user->email }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h4><strong>Whatsapp</strong> </h4>
                                <h5>{{ $user->whatsapp }}</h5>
                            </div>
                            

                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h4><strong>Dirección</strong> </h4>
                                <h5>{{ $user->direccion }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h4>
                                    <h4><strong>Teléfono</strong> </h4>
                                </h4>
                                <h5>{{ $user->telefono }}</h5>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h4><strong>Rol</strong> </h4>
                                <h5>{{ $user->role }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h4><strong>Desde:</strong> </h4>
                                <h5>{{ $user->created_at }}</h5>
                            </div>
                        </div>
                        <h4><strong>Subscripcion</strong></h4>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h4><strong>Fecha Inicio:</strong> </h4>
                                <h5>{{ $user->fecha_inicio }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h4><strong>Fecha Fin:</strong> </h4>
                                <h5>{{ $user->fecha_fin }}</h5>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if( $user->role == 'empresa')
                        <div class="mb-4 text-center">
                            <div class="avatar-flip">
                                @if( $user->imagen == '')
                                <img img src="/images/default-person.jpg" class="img-thumbnail" alt="Usuario" height="250px"
                                    width="250px">
                                @else
                                <img src="/{{ $user->imagen }}" class="img-thumbnail" alt="Usuario" height="250px"
                                    width="250px" style="display: block;margin: 0 auto;">
                                @endif
                            </div>
                            <h2 style="text-align: center;">{{ $user->name }}</h2>
                            <h4 style="text-align: center;">{{ $user->ciudad }}, {{ Auth::user()->pais }}</h4><br>
                            <div class="row mb-4">
                            
                                <div class="col-md-6">
                                    <h4><strong>Apellido</strong> </h4>
                                    <h5>{{ $user->apellido }}</h5>
                                </div>
                        
                                <div class="col-md-6">
                                    <h4><strong>Correo Electronico</strong> </h4>
                                    <h5>{{ $user->email }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <h4><strong>Whatsapp</strong> </h4>
                                    <h5>{{ $user->whatsapp }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <h4><strong>Nit</strong> </h4>
                                    <h5>{{ $user->nit }}</h5>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h4><strong>Dirección</strong> </h4>
                                    <h5>{{ $user->direccion }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <h4>
                                        <h4><strong>Teléfono</strong> </h4>
                                    </h4>
                                    <h5>{{ $user->telefono }}</h5>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h4><strong>Rol</strong> </h4>
                                    <h5>{{ $user->role }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <h4><strong>Desde:</strong> </h4>
                                    <h5>{{ $user->created_at }}</h5>
                                </div>
                            </div>
                            <h4><strong>Subscripcion</strong></h4>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h4><strong>Fecha Inicio:</strong> </h4>
                                    <h5>{{ $user->fecha_inicio }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <h4><strong>Fecha Fin:</strong> </h4>
                                    <h5>{{ $user->fecha_fin }}</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
<style>
    .modal-dialog {
        max-width: 620px !important;
    }

    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        width: 100%;
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }

    .container {
        width: 400px;
        margin: 120px auto 120px;
        background-color: #fff;
        padding: 0 20px 20px;
        border-radius: 6px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.075);
        -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.075);
        text-align: center;
    }

    .container:hover .avatar-flip {
        transform: rotateY(180deg);
        -webkit-transform: rotateY(180deg);
    }

    .container:hover .avatar-flip img:first-child {
        opacity: 0;
    }

    .container:hover .avatar-flip img:last-child {
        opacity: 1;
    }

    .avatar-flip {
        border-radius: 100px;
        overflow: hidden;
        height: 250px;
        width: 250px;
        position: relative;
        margin: auto;
        top: -60px;
        transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        box-shadow: 0 0 0 13px #f0f0f0;
        -webkit-box-shadow: 0 0 0 13px #f0f0f0;
        -moz-box-shadow: 0 0 0 13px #f0f0f0;
    }

    .avatar-flip img {
        position: absolute;
        left: 0;
        top: 0;
        border-radius: 100px;
        transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
    }

    .avatar-flip img:first-child {
        z-index: 1;
    }

    .avatar-flip img:last-child {
        z-index: 0;
        transform: rotateY(180deg);
        -webkit-transform: rotateY(180deg);
    }

    h2 {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }

    h4 {
        font-size: 13px;
        color: #00baff;
        letter-spacing: 1px;
        margin-bottom: 25px
    }

    p {
        font-size: 16px;
        line-height: 26px;
        margin-bottom: 20px;
        color: #666;
    }

</style>
