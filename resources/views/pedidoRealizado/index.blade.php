@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Pedidos Pendientes</h1>
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
        </div><br>
        <!-- <div class="card-header border-0">
            <h3 class="card-title">Productos</h3>
             <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div> 
        </div> -->
        <div class="card-body table-responsive">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                       <!-- <th>Id</th>   -->
                        <th style="text-align:center;">Nombre Usuario</th>
                        <th style="text-align:center;">Fecha Pedido</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidoRealizado as $productos)
                    <tr>
                        <!-- <td style="text-align:center;">
                            @if( $productos->imagen == '')
                            <img img src="images/default-person.jpg" class="img-thumbnail" alt="Producto" height="150px"
                                width="150px">
                            @else
                            <img src="/{{$productos->imagen }}" class="img-thumbnail" alt="Producto" height="150px"
                                width="150px" style="display: block;margin: 0 auto;">
                            @endif
                        </td> -->
                        <td style="text-align:center;">{{ $productos->user_id }}</td>
                        <td style="text-align:center;">{{ $productos->created_at }}</td>

                  
               
                        <td>
                            <div class="card-body">
                                <a class="btn btn-app " href="{{ route('pedidoRealizado.show',$productos->id ) }}">
                                    <i class="fas fa-eye"></i> Ver Pedido
                                </a>
                                <!-- @if($productos->importadora == Auth::user()->name)
                                <form action="{{ route('productos.destroy',$productos->id ) }}" method="POST"
                                    accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-app" type="submit" class="btn btn-danger btn-sm"
                                        title="Delete Image" onclick="return confirm(&quot;¿Desea eliminar?&quot;)">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                                </form>
                                @endif
                                @if(Auth::user()->role == 'admin')
                                <a class="btn btn-app" data-toggle="modal"
                                    data-target="#modalNovedades{{$productos->id}}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-star"></i> Novedad
                                </a>
                                @endif -->
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{ $pedidoRealizado->links() }}
        </div>
    </div>
</div>
@endsection