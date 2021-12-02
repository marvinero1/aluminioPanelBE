@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Hoja de Calculo para Corte</h1>
    <div class="content">
        @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        {{-- <th>Id</th>  --}}
                        <th style="text-align:center;">ID</th>
                       <!--  <th style="text-align:center;">Estado</th> -->
                        <th style="text-align:center;">Nombre Cliente</th>
                        <th style="text-align:center;">Celular</th>
                        <th style="text-align:center;">M2</th>
                        <th style="text-align:center;">Descripcion</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hoja_calculo_perfil as $hoja_calculo_perfils)
                    <tr>
                        <td style="text-align:center;">{{ $hoja_calculo_perfils->id }}</td>
                        <!-- <td style="text-align:center;">{{ $hoja_calculo_perfils->estado }}</td> -->
                        <td style="text-align:center;">{{ $hoja_calculo_perfils->nombre_cliente }}</td>
                        <td style="text-align:center;">{{ $hoja_calculo_perfils->celular }}</td>
                        <td style="text-align:center;">{{ $hoja_calculo_perfils->suma_m2 }}</td>
                        <td style="text-align:center;">{{ $hoja_calculo_perfils->descripcion }}</td>
                        
                        <td style="text-align:center;">
                            <a href="{{ route('hojaCalculo.show',$hoja_calculo_perfils->id ) }}">
                                <button class="btn btn-light btn-sm"><i class="fa fa-eye"
                                        aria-hidden="true"></i> Ver
                                </button></a>

                             <a href="{{ route('cortadora.cortadoraInfoGeneral',$hoja_calculo_perfils->id ) }}">
                                <button class="btn btn-info btn-sm"><i class="fa fa-files-o" aria-hidden="true"></i> Info General
                                </button></a>
                             <a href="{{ route('cortadora.cortadoraInfoVentanas',$hoja_calculo_perfils->id ) }}">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-window-restore" aria-hidden="true"></i> Ventanas
                                </button></a>

                            @if($hoja_calculo_perfils->estado != 'false')
                            <a href="{{ route('cotizacion.cotizacion',$hoja_calculo_perfils->id )}}">
                                <button class="btn btn-success btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Cotización
                                </button>
                            </a>
                            <a href="{{ route('precioEditCortadora.precioEditCortadora',$hoja_calculo_perfils->id )}}">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar Cotización
                                </button>
                            </a>
                            @endif
                            <form action="{{ route('cortadora.destroyHojaPerfil',$hoja_calculo_perfils->id ) }}" method="POST"
                                accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                    onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fas fa-trash"
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