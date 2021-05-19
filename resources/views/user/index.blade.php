@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Usuarios</h1>
    <div class="content">
        {{-- @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <div class="float-left">
        <a href="{{ route('categoria.create')}}"><button class="btn btn-primary">
                <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Categorias</button></a>
    </div> --}}
    <div class="float-right">
        <form class="form-inline my-2 my-lg-0">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscador Usuario"
                aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="border: 1px #3097D1 solid;">
                <span class="search"></span>&nbsp;Buscar</button>
        </form>
    </div><br><br><br>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    {{-- <th>Id</th>  --}}
                    <th style="text-align:center;">Imagen</th>
                    <th style="text-align:center;">Nombre Empresa</th>
                    <th style="text-align:center;">Apellido</th>
                    <th style="text-align:center;">Telefono</th>
                    <th style="text-align:center;">Whatsapp</th>
                    <th style="text-align:center;">Role</th>
                    <th style="text-align:center;">Registrado</th>
                    <th style="text-align:center;">Subscripción</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $users)
                <tr>
                    <td style="text-align:center;">

                        @if( $users->imagen == '')
                        <img img src="/images/default-person.jpg" class="img-thumbnail" alt="Usuario" height="150px"
                            width="150px">
                        @else
                        <img src="/{{$users->imagen }}" class="img-thumbnail" alt="Usuario" height="150px" width="150px"
                            style="display: block;margin: 0 auto;">
                        @endif
                    </td>
                    <td style="text-align:center;">{{ $users->name }}</td>
                    <td style="text-align:center;">{{ $users->apellido }}</td>
                    <td style="text-align:center;">{{ $users->telefono }}</td>
                    <td style="text-align:center;">{{ $users->whatsapp }}</td>
                    <td style="text-align:center;">{{ $users->role }}</td>
                    <td style="text-align:center;">{{ $users->registrado }}</td>
                    @if($users->subscripcion == 'false' )
                    <td style="text-align:center; color:red;">{{ $users->subscripcion }}</td>
                    @endif
                    @if($users->subscripcion == 'true' )
                    <td style="text-align:center; color:green;">{{ $users->subscripcion }}</td>
                    @endif

                    <td style="text-align:center;">
                        <a href="{{ route('user.show',$users->id ) }}">
                            <button class="btn btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Ver</button>
                        </a>
                        <button data-toggle="modal" data-target="#modalFavoritos{{$users->id}}"
                            class="btn btn-warning btn-sm"><i class="fa fa-star" aria-hidden="true"></i> Subscribir
                        </button>
                        <button data-toggle="modal" data-target="#modalVendedor{{$users->id}}"
                            class="btn btn-success btn-sm">Dar Permiso de
                            Vendedor
                        </button>
                        <div class="modal fade" id="modalFavoritos{{$users->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="max-width: 410px !important;" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Administración Subscripción</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Subscribir a {{$users->name}}</h4>
                                        <form action="{{route('user.subscripcion', $users->id)}}" method="POST"
                                            enctype="multipart/form-data" style="margin-block-end: -1em !important;">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            @if($users->subscripcion == 'false')
                                            <input type="hidden" name="subscripcion" value="true">
                                            <div class="form-group row">
                                                <div class="col-md-6 ">
                                                    <label><strong>Fecha Inicio</strong> </label>
                                                    <input type="date" name="fecha_inicio" max="3000-12-31"
                                                        min="1000-01-01" class="form-control" id="fecha_inicio">
                                                </div>
                                                <div class="col-md-6 ">
                                                    <label><strong>Fecha Fin</strong> </label>
                                                    <input type="date" name="fecha_fin" max="3000-12-31"
                                                        min="1000-01-01" class="form-control" id="fecha_fin">
                                                </div>
                                            </div>
                                            @endif
                                            @if($users->subscripcion == 'true')
                                            <input type="hidden" name="subscripcion" value="false">
                                            @endif
                                            {{-- @if(Auth::user())
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            @endif --}}

                                            <div class="row" style="display: block;">
                                                <div class="modal-footer">
                                                    @if($users->subscripcion == 'false' || $users->subscripcion == '')
                                                    <button type="submit" class="btn btn-primary"
                                                        style="width: 100% !important; "><span
                                                            class="icon-star"></span>&nbsp;
                                                        <strong>Subscribir</strong>
                                                    </button>
                                                    @endif
                                                    @if($users->subscripcion == 'true')
                                                    <button type="submit" class="btn btn-primary"
                                                        style="width: 100% !important; "><span
                                                            class="icon-star"></span>&nbsp;
                                                        <strong>Quitar Subscribcion</strong>
                                                    </button>
                                                    @endif
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="modal fade" id="modalVendedor{{$users->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="max-width: 450px !important;" role="document">
                                <div class="modal-content" style="height: 166px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Administración Subscripción</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Subscribir como Vendedor a: {{$users->name}}</h4>
                                        <form action="{{route('user.convertVendedor', $users->id)}}" method="POST"
                                            enctype="multipart/form-data" style="margin-block-end: -1em !important;">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            @if($users->role == 'user')
                                            <input type="hidden" name="role" value="vendedor">
                                            @endif

                                            @if($users->role == 'vendedor')
                                            <input type="hidden" name="role" value="user">
                                            @endif
                                            {{-- @if(Auth::user())
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            @endif --}}

                                            <button type="submit" class="btn btn-primary" style="float: right;">Guardar</button>  <br>                                     
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table><br><br>
    </div>
    <div style="text-align: center;">
        {{ $user->links() }}
    </div>
</div>
</div>

@endsection
<style>
    .modal-dialog {
        max-width: 780px !important;
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

</style>
