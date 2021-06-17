@extends('layouts.main')

@section('content')
<div class="content-wrapper ">
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mb-4 text-center">
                        <div class="avatar-flip">
                            @if( Auth::user()->imagen == '')
                            <img img src="/images/default-person.jpg" alt="Usuario" style="height: 100%;
                            width: 100%;">
                            @else
                            <img src="/{{ Auth::user()->imagen }}" alt="Usuario" style="display: block;margin: 0 auto;height: 100%;
                            width: 100%;">
                            @endif
                        </div>
                        <h2 style="text-align: center;">{{ Auth::user()->name }}</h2>
                        <h4 style="text-align: center;">{{ Auth::user()->ciudad }}, {{ Auth::user()->pais }}</h4><br>
                        <div class="row mb-4">
                            @if( Auth::user()->role == 'user' )
                            <div class="col-md-6">
                                <h4><strong>Apellido</strong> </h4>
                                <h5>{{ Auth::user()->apellido }}</h5>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <h4><strong>Correo Electronico</strong> </h4>
                                <h5>{{ Auth::user()->email }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h4><strong>Whatsapp</strong> </h4>
                                <h5>{{ Auth::user()->whatsapp }}</h5>
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h4><strong>Dirección</strong> </h4>
                                <h5>{{ Auth::user()->direccion }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h4>
                                    <h4><strong>Teléfono</strong> </h4>
                                </h4>
                                <h5>{{ Auth::user()->telefono }}</h5>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h4><strong>Rol</strong> </h4>
                                <h5>{{ Auth::user()->role }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h4><strong>Desde:</strong> </h4>
                                <h5>{{ Auth::user()->created_at->format('d/F/Y') }}</h5>
                            </div>
                        </div>

                        <!-- Button edit modal -->
                        <button type="button" class="btn btn-dark" data-toggle="modal"
                            data-target="#exampleModal{{ Auth::user()->id }}"><i class="nav-icon fas fa-pencil-alt"></i>
                            Editar</button>

                        <!-- Button pasword modal -->
                        <button type="button" class="btn btn-dark" data-toggle="modal"
                            data-target="#exampleModalpassword{{ Auth::user()->id }}"><i
                                class="nav-icon fas fa-key"></i>
                            Restablecer Contraseña</button>

                        <!-- Modal Edit-->
                        <div class="modal fade" id="exampleModal{{ Auth::user()->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel"><strong>Editar
                                                Perfil</strong> </h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @if( Auth::user()->role == 'user' || Auth::user()->role == 'admin' || Auth::user()->role == 'vendedor')
                                    <div class="modal-body">
                                        <form action="{{route('user.update', Auth::user()->id)}}" method="POST"
                                            enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{ method_field('PUT') }}

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <p><strong>Imagen</strong></p>
                                                    <label for="file-upload" class="custom-file-upload"
                                                        style="text-align: center;">
                                                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                                        <strong>Imagen</strong>
                                                    </label>
                                                    <p><strong>Sugerencia:</strong> Para una mejor visualizacion se
                                                        recomienda resolucion a partir de<strong> 1024 × 768
                                                            pixels</strong></p>
                                                    <input id="file-upload" type="file" name="imagen">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre"
                                                        placeholder="Nombre" name="name"
                                                        value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Apellido</label>
                                                    <input type="text" class="form-control" placeholder="Apellido"
                                                        name="apellido" value="{{ Auth::user()->apellido }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" placeholder="Direccion"
                                                        name="direccion" value="{{ Auth::user()->direccion }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Teléfono</label>
                                                    <input type="number" class="form-control" placeholder="Telefono"
                                                        name="telefono" value="{{ Auth::user()->telefono }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Pais</label>
                                                    <input type="text" class="form-control" placeholder="Pais"
                                                        name="pais" value="{{ Auth::user()->pais }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Ciudad</label>
                                                    <input type="text" class="form-control" placeholder="Ciudad"
                                                        name="ciudad" value="{{ Auth::user()->ciudad }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Whatsapp</label>
                                                    <input type="number" class="form-control" placeholder="Whatsapp"
                                                        name="whatsapp" value="{{ Auth::user()->whatsapp }}">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary px-4 float-right">
                                                    <span class="icon-save"></span>&nbsp;Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                    @if( Auth::user()->role == 'empresa')
                                    <div class="modal-body">
                                        <form action="{{route('user.update', Auth::user()->id)}}" method="POST"
                                            enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">

                                                <div class="col-sm-12">
                                                    <p><strong>Imagen</strong></p>
                                                    <label for="file-upload" class="custom-file-upload"
                                                        style="text-align: center;">
                                                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                                        <strong>Imagen</strong>
                                                    </label>
                                                    <p><strong>Sugerencia:</strong> Para una mejor visualizacion se
                                                        recomienda resolucion a partir de<strong> 1024 × 768
                                                            pixels</strong></p>
                                                    <input id="file-upload" type="file" name="imagen">
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Nombre Empresa</label>
                                                    <input type="text" class="form-control" placeholder="Nombre Empresa"
                                                        name="name" value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Nit</label>
                                                    <input type="number" class="form-control" placeholder="Nit"
                                                        name="nit" value="{{ Auth::user()->nit }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Pais</label>
                                                    <input type="text" class="form-control" placeholder="Pais"
                                                        name="pais" value="{{ Auth::user()->pais }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Ciudad</label>
                                                    <input type="text" class="form-control" placeholder="Ciudad"
                                                        name="ciudad" value="{{ Auth::user()->ciudad }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" placeholder="Direccion"
                                                        name="direccion" value="{{ Auth::user()->direccion }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Teléfono</label>
                                                    <input type="number" class="form-control" placeholder="Telefono"
                                                        name="telefono" value="{{ Auth::user()->telefono }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Whatsapp</label>
                                                    <input type="number" class="form-control" placeholder="Whatsapp"
                                                        name="whatsapp" value="{{ Auth::user()->whatsapp }}">
                                                </div>
                                            </div><br>
                                            {{-- <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <label>Correo Electronico</label>
                                                            <input type="text" class="form-control" placeholder="Email "
                                                                name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" placeholder="Contraseña"
                                            name="password">
                                    </div>
                                    <input type="hidden" name="role" value="empresa">
                                </div> --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary px-4 float-right">
                                        <span class="icon-save"></span>&nbsp;Guardar</button>
                                </div>
                                </form>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>

                <!-- Modal Password -->
                <div class="modal fade" id="exampleModalpassword{{ Auth::user()->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('user.updatepassword', Auth::user()->id)}}" method="POST"
                                enctype="multipart/form-data">

                                <div class="modal-body">
                                    <div class="form-group row">
                                        {{csrf_field()}}
                                        {{ method_field('PUT') }}
                                        <div class="col-sm-6">
                                            <label>Correo Electronico</label>
                                            <input type="text" class="form-control" placeholder="Email " name="email"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Contraseña</label>
                                            <input type="password" class="form-control" placeholder="Contraseña"
                                                name="password">
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary px-4 float-right">
                                        <span class="icon-save"></span>&nbsp;Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
        
    }
</style>