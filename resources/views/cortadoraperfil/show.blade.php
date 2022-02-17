@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Combinaciones y Medidas</h1>
    <div class="content">
        @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="row p-3">
            <div class="col-md-6">
                <div class="row">
                    <p><strong>Nombre Cliente: </strong></p> {{ $nombre_cliente }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="float-right">
                    <a  href="/cortadoraPerfil" class="btn btn-warning">Atras</a>
                </div> 
           </div>
        </div>
  
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th style="text-align:center;">Combinación</th>
                        <th style="text-align:center;">Linea</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perfil as $perfils)
                    <tr> 
                        @if($perfils->combinacion == "combinacion1")
                        <td style="text-align:center;">Dos Hojas</td>
                        @endif
                        @if($perfils->combinacion == "combinacion4")
                        <td style="text-align:center;">Tres Hojas</td>
                        @endif
                        @if($perfils->combinacion == "combinacion5")
                        <td style="text-align:center;">Cuatro Hojas</td>
                        @endif
                        <td style="text-align:center;">{{ $perfils->linea }}</td>
                        <td style="text-align:center;">
                            
                            @if($perfils->estado != "true")
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal{{$perfils->id}}">
                                <i class="fa fa-bars" aria-hidden="true"></i> Crear Conjunto de Barras </button> 

                                <!-- <a href="{{ route('perfil.show', $perfils->id ) }}">
                                    <button class="btn btn-dark btn-sm"><i class="fa fa-check" aria-hidden="true"></i> Confirmar Pedido
                                    </button>
                                </a> -->
                            @endif
                            <form action="{{ route('perfil.destroy',$perfils->id ) }}" method="POST"
                                accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                    onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fas fa-trash"
                                        aria-hidden="true"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr> 

                    <!-- modal crear barra -->
                    <div class="modal fade" id="exampleModal{{$perfils->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$perfils->id}}" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content text-center">
                              <div class="modal-header" style="display: block;">
                                <h5 class="modal-title" id="exampleModalLabel">Crear Barra</h5>
                              </div>
                                <form action="{{route('barra.store')}}" method="POST">
                                {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row"> 
                                                <div class="col">
                                                     <h5>Creacion de Barras para Linea</h5><p><strong>{{ $perfils->linea }}</strong></p>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="input-group mb-3">
                                                        <input hidden type="text" value="{{ $perfils->linea }}" name="linea" placeholder="{{ $perfils->linea }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <input hidden type="text" value="{{ $perfils->id }}" name="perfil_id">
                                            <input hidden type="text" value="{{ $perfils->ancho }}" name="ancho">  
                                            <input hidden type="text" value="{{ $perfils->alto }}" name="alto">  
                                            <input hidden type="text" value="{{ $perfils->hoja_id }}" name="hoja_id">


                                            <input hidden type="text" value="{{ $perfils->combinacion }}" name="combinacion">  
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button  type="submit" class="btn btn-primary">Guardar Barra</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- modal confirmacion estado -->
                    <!-- <div class="modal fade" id="exampleModal1{{$perfils->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$perfils->id}}" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content text-center">
                              <div class="modal-header" style="display: block;">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                              </div>
                                <form action="{{route('perfil.updatePerfil', $perfils->id ) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                    <div class="modal-body text-center">
                                        <div class="container">
                                            <div class="row"> 
                                                <div class="col">
                                                     <h5>Confirmar Creacion para linea</h5><p><strong>{{ $perfils->linea }}</strong></p>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="input-group mb-3">
                                                        <input hidden type="text" value="true" 
                                                        name="estado">
                                                    </div>
                                                </div>
                                                 <div class="col-md-12">
                                                    <div class="input-group mb-3">
                                                        <input hidden type="text" value="{{ $perfils->hoja_id }}" name="hoja_id">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                                            Cancelar
                                        </button>

                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Confirmar</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                    </div> -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection