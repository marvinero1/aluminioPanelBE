@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Historial Pedidos Confirmados</h1>
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
                        type="search" placeholder="Buscador Nombre Importadora" aria-label="Search"
                        style="width: 65% !important;">&nbsp;&nbsp;
                    <button class="btn btn-outline-success " type="submit" style="border: 1px #3097D1 solid;">
                        <span class="search"></span>&nbsp;Buscar</button>
                </form>
            </div>
        </div><br>
        <div class="card-body table-responsive">
            <table class="table table-striped table-sm table-valign-middle">
                <thead>
                    <tr>
                        <th style="text-align:center;">Nombre Importadora</th>
                        <th style="text-align:center;">Descripcion</th>
                        <th style="text-align:center;">Cotizacion del Usuario</th>                   
                        <th style="text-align:center;">Enviado en Fecha</th>
                        <th style="text-align:center;">Cotizacion PDF</th>   
                        {{-- <th style="text-align:center;">Acciones</th>                       --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedido as $carritos)
                    <tr>
                        <td style="text-align:center;">{{ $carritos->importadora }}</td>
                        <td style="text-align:center;">{{ $carritos->descripcion }}</td>
                        <td style="text-align:center;">{{ $carritos->user->name }}</td>
                        <td style="text-align:center;">{{ $carritos->created_at->format('d/F/Y') }}</td> 
                        <td style="text-align:center;">

                            <a href="{{ route('downloads', $carritos->file ) }}" class="btn btn-primary">
                                  <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar PDF
                            </a>
                        </td>                       
                                 
                        {{-- <td style="text-align:center;">
                            <div class="card-body">
                                <a class="btn btn-app" href="{{ route('carritoDetalle.show', $carritos->id )}}">
                                    <i class="fas fa-eye"></i> Ver Pedido
                                </a>
                            </div>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{ $pedido->links() }}
        </div>
    </div>
</div>
@endsection