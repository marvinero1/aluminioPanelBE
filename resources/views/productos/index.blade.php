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
        <div class="col-md-6 float-left">
            <div class="input-group col-md-8 float-left">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fas fa-search"></i></span>
                </div>
                <form style="display: contents !important;margin-top: 0em !important;margin-block-end: 0em !important">
                    <input type="text" aria-describedby="basic-addon1" name="buscarpor" class="form-control "
                        type="search" placeholder="Buscador Nombre Producto" aria-label="Search"
                        style="width: 55% !important;">&nbsp;&nbsp;
                    <button class="btn btn-outline-success " type="submit" style="border: 1px #3097D1 solid;">
                        <span class="search"></span>&nbsp;Buscar</button>
                </form>
            </div>
        </div>
        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'empresa')
        <div class="float-right">
            <a href="{{ route('productos.create')}}"><button class="btn btn-primary">
                    <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Producto</button></a>
        </div>
        @endif
        <br><br><br>

        <div class="card-header border-0">
            <h3 class="card-title">Productos</h3>
            {{-- <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div> --}}
        </div>
        <div class="card-body table-responsive">
            <table class="table table-sm table-striped table-valign-middle ">
                <thead>
                    <tr>
                        {{-- <th>Id</th>  --}}
                        <th style="text-align:center;">Imagen</th>
                        <th style="text-align:center;">Codigo</th>
                        <th style="text-align:center;">Nombre</th>
                        <th style="text-align:center;">Precio Bs.</th>
                        {{-- <th style="text-align:center;">Medida</th>
                        <th style="text-align:center;">Tipo de Medida</th> --}}
                        {{-- <th style="text-align:center;">Puntuacion</th> --}}
                        <th style="text-align:center;">Importadora</th>
                        <th style="text-align:center;">Descripción</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($producto as $productos)
                    <tr>
                        <td style="text-align:center;">
                            @if( $productos->imagen == '')
                            <img img src="images/default-tool.png" class="img-thumbnail" alt="Producto" width="75px">
                            @else
                            <img src="/{{$productos->imagen }}" class="img-thumbnail" alt="Producto" width="75px" style="display: block;margin: 0 auto;">
                            @endif
                        </td>
                        <td style="text-align:center;">{{ $productos->codigo }}</td>

                        <td style="text-align:center;">{{ $productos->nombre }}</td>
                        
                        <td style="text-align:center;">{{ $productos->precio }} Bs.</td>
                        {{-- <td style="text-align:center;">{{ $productos->medida }}</td>
                        <td style="text-align:center;">{{ $productos->tipo_medida }}</td> --}}
                        {{-- <td style="text-align:center;">{{ $productos->puntuacion }}</td> --}}
                        <td style="text-align:center;">{{ $productos->importadora }}</td>
                        <td style="text-align:center;">{{ $productos->descripcion }}</td>
                        {{-- <td style="text-align:center;">{{ $productos->categorias->nombre }}</td> --}}
                        <td style="text-align: center;">
                            <div class="card-body">
                                <a class="btn btn-app" data-toggle="modal"
                                    data-target="#modalFavoritos{{$productos->id}}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-heart"></i> Favoritos
                                </a>

                                <a class="btn btn-app " href="{{ route('productos.show',$productos->id ) }}">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                                @if($productos->importadora == Auth::user()->name)

                                    <form action="{{ route('productos.destroy',$productos->id ) }}" method="POST"
                                        accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-app" title="Delete Image"
                                        class="btn btn-danger btn-sm"
                                        title="Delete Image" onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fas fa-trash"
                                                aria-hidden="true"></i> Eliminar</button>
                                    </form>
                                @endif
                                @if(Auth::user()->role == 'admin')
                                <a class="btn btn-app" data-toggle="modal"
                                    data-target="#modalNovedades{{$productos->id}}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-star"></i> Novedad
                                </a>
                                @endif
                            </div>


                        </td>
                        <td style="text-align:center;">
                            {{-- MODAL FAVORITOS --}}
                            <div class="modal fade" id="modalFavoritos{{$productos->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 337px !important;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Administración Favoritos</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="icon-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('favoritos.store')}}" method="POST"
                                                enctype="multipart/form-data" style="margin-block-end:-1em !important;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="productos_id" value="{{$productos->id}}">
                                                <input type="hidden" name="nombre" value="{{$productos->nombre}}">
                                                <input type="hidden" name="codigo" value="{{$productos->codigo}}">
                                                <input type="hidden" name="precio" value="{{$productos->precio}}">
                                                <input type="hidden" name="color" value="{{$productos->color}}">
                                                <input type="hidden" name="estado" value="{{$productos->estado}}">
                                                <input type="hidden" name="importadora"
                                                    value="{{$productos->importadora}}">
                                                <input type="hidden" name="imagen" value="{{$productos->imagen}}">

                                                @if(Auth::user())
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                @endif
                                                <h4>Agregar a Lista de Favoritos</h4>
                                                <div class="row" style="display: block;">
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 100% !important; "><span
                                                                class="icon-heart"></span>&nbsp; Añadir</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>
                        <td>
                            {{-- MODAL Novedades --}}
                            <div class="modal fade" id="modalNovedades{{$productos->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 337px !important;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Administración Novedades</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="icon-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('producto.addNovedad', $productos->id)}}"
                                                method="POST" enctype="multipart/form-data"
                                                style="margin-block-end:-1em !important;">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <input type="hidden" name="novedad" value="true">

                                                @if(Auth::user())
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                @endif
                                                <h4>Agregar a Lista de Novedad</h4>
                                                <div class="row" style="display: block;">
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="width: 100% !important; "><span
                                                                class="icon-star"></span>&nbsp; Añadir</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{ $producto->links() }}
        </div>
    </div>
</div>
@endsection
