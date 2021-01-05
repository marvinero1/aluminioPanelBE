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
                <input name="buscarpor" class="form-control mr-sm-2" type="search"
                    placeholder="Buscador Usuario" aria-label="Search">
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
                        <th style="text-align:center;">Nombre</th>
                        <th style="text-align:center;">Apellido</th>
                        <th style="text-align:center;">Direccion</th>
                        <th style="text-align:center;">Telefono</th>
                        <th style="text-align:center;">Pais</th>
                        <th style="text-align:center;">Ciudad</th>
                        <th style="text-align:center;">Whatsapp</th>
                        <th style="text-align:center;">Nombre Empresa</th>
                        <th style="text-align:center;">Nit</th>
                        <th style="text-align:center;">Role</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $users)
                    <tr>
                        <td style="text-align:center;">

                        @if( $users->imagen == 'null')
                            <img img src="images/default-person.jpg" class="img-thumbnail" alt="Usuario" height="150px" width="150px">
                        @else
                            <img src="/{{$users->imagen }}" class="img-thumbnail" alt="Usuario" height="150px" width="150px"
                                style="display: block;margin: 0 auto;">
                        @endif
                        </td>
                        <td style="text-align:center;">{{ $users->name }}</td>
                        <td style="text-align:center;">{{ $users->apellido }}</td>
                        <td style="text-align:center;">{{ $users->direccion }}</td>
                        <td style="text-align:center;">{{ $users->telefono }}</td>
                        <td style="text-align:center;">{{ $users->pais }}</td>
                        <td style="text-align:center;">{{ $users->ciudad }}</td>
                        <td style="text-align:center;">{{ $users->whatsapp }}</td>
                        <td style="text-align:center;">{{ $users->nombre_empresa }}</td>
                        <td style="text-align:center;">{{ $users->nit }}</td>
                        <td style="text-align:center;">{{ $users->role }}</td>
                        {{-- <td style="text-align:center;">
                            <form action="{{ route('user.destroy',$users->id ) }}" method="POST"
                                accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                    onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i> Eliminar</button>
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach


                </tbody>
            </table><br><br>



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
