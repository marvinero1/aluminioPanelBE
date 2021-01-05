@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Productos</h1>
    <div class="content">
        @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="float-left">
            <a href="{{ route('productos.create')}}"><button class="btn btn-primary">
                    <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Producto</button></a>
        </div>
        <div class="float-right">
            <form class="form-inline my-2 my-lg-0">
                <input name="buscarpor" class="form-control mr-sm-2" type="search"
                    placeholder="Buscador Producto" aria-label="Search">
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
                        <th style="text-align:center;">Estado</th>
                        <th style="text-align:center;">Precio</th>
                        <th style="text-align:center;">Medida</th>
                        <th style="text-align:center;">Tipo de Medida</th>
                        {{-- <th style="text-align:center;">Puntuacion</th> --}}
                        <th style="text-align:center;">Importadora</th>
                        <th style="text-align:center;">Descripción</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($producto as $productos)
                    <tr>
                        
                        <td> @if( $productos->imagen == '')
                            <img img src="images/default-person.jpg" class="img-thumbnail" alt="Producto" height="150px" width="150px">
                        @else
                            <img src="/{{$productos->imagen }}" class="img-thumbnail" alt="Producto" height="150px" width="150px"
                                style="display: block;margin: 0 auto;">
                        @endif</td>
                        <td style="text-align:center;">{{ $productos->nombre }}</td>
                        <td style="text-align:center;">{{ $productos->estado }}</td>
                        <td style="text-align:center;">{{ $productos->precio }}</td>
                        <td style="text-align:center;">{{ $productos->medida }}</td>
                        <td style="text-align:center;">{{ $productos->tipo_medida }}</td>
                        {{-- <td style="text-align:center;">{{ $productos->puntuacion }}</td> --}}
                        <td style="text-align:center;">{{ $productos->importadora }}</td>
                        <td style="text-align:center;">{{ $productos->descripcion }}</td>
                        {{-- <td style="text-align:center;">{{ $productos->categorias->nombre }}</td> --}}

                        <td style="text-align:center;">
                            <form action="{{ route('productos.destroy',$productos->id ) }}" method="POST"
                                accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                    onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br><br>
        </div>
    </div>
</div>
@endsection