@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Productos de Novedad</h1>
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
                    <input type="text" aria-describedby="basic-addon1" name="buscarpor" class="form-control " type="search"
                    placeholder="Buscador Nombre Producto" aria-label="Search" style="width: 55% !important;">&nbsp;&nbsp;
                    <button class="btn btn-outline-success " type="submit" style="border: 1px #3097D1 solid;">
                        <span class="search"></span>&nbsp;Buscar</button>
                </form>
              </div>
        </div>
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
              <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        {{-- <th>Id</th>  --}}
                        <th style="text-align:center;">Imagen</th>
                        <th style="text-align:center;">Nombre</th>
                        <th style="text-align:center;">Estado</th>
                        <th style="text-align:center;">Precio</th>
                        {{-- <th style="text-align:center;">Medida</th>
                        <th style="text-align:center;">Tipo de Medida</th> --}}
                        {{-- <th style="text-align:center;">Puntuacion</th> --}}
                        <th style="text-align:center;">Importadora / Usuario</th>
                        <th style="text-align:center;">Descripción</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($producto as $productos)
                    <tr>
                        <td style="text-align:center;"> 
                        @if( $productos->imagen == '')
                            <img img src="images/default-person.jpg" class="img-thumbnail" alt="Producto" height="150px" width="150px">
                        @else
                            <img src="/{{$productos->imagen }}" class="img-thumbnail" alt="Producto" height="150px" width="150px"
                                style="display: block;margin: 0 auto;">
                        @endif</td>
                        <td style="text-align:center;">{{ $productos->nombre }}</td>
                        <td style="text-align:center;">{{ $productos->estado }}</td>
                        <td style="text-align:center;">{{ $productos->precio }}</td>
                        {{-- <td style="text-align:center;">{{ $productos->medida }}</td>
                        <td style="text-align:center;">{{ $productos->tipo_medida }}</td> --}}
                        {{-- <td style="text-align:center;">{{ $productos->puntuacion }}</td> --}}
                        <td style="text-align:center;">{{ $productos->importadora }}</td>
                        <td style="text-align:center;">{{ $productos->descripcion }}</td>
                        {{-- <td style="text-align:center;">{{ $productos->categorias->nombre }}</td> --}}
              
                        
                        <td><a class="btn btn-app " href="{{ route('productos.show',$productos->id ) }}">
                            <i class="fas fa-eye"></i> Ver
                          </a>
                        
                          <button data-toggle="modal" data-target="#modalFavoritos{{$productos->id}}"
                            class="btn btn-danger btn-sm"><i class="fa fa-trash"
                            aria-hidden="true"></i> Quitar Novedad
                    </button>

                    <div class="modal fade" id="modalFavoritos{{$productos->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 410px !important;" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Administración Novedades</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h4>Quitar novedad del producto {{$productos->nombre}}</h4>
                                    <form action="{{route('producto.addNovedad', $productos->id)}}" method="POST"
                                        enctype="multipart/form-data" style="margin-block-end: -1em !important;">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        
                                        @if($productos->novedad == 'true')
                                            <input type="hidden" name="novedad" value="false">
                                        @endif
                                        {{-- @if(Auth::user())
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        @endif --}}
                                       
                                        <div class="row" style="display: block;">
                                            <div class="modal-footer">
                                                
                                              @if($productos->novedad == 'true')
                                                  <button type="submit" class="btn btn-primary"
                                                  style="width: 100% !important; "><span
                                                      class="icon-trash"></span>&nbsp;
                                                  <strong>Quitar de Novedades</strong>
                                                  </button>
                                              @endif
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