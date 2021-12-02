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
        <div class="table-responsive"><br>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th style="text-align:center;">Combinación</th>
                        <th style="text-align:center;">Linea</th>
                        <th style="text-align:center;">Ancho</th>
                        <th style="text-align:center;">Alto</th>
                        <th style="text-align:center;">#Repeticion</th>
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
                        <td style="text-align:center;">{{ $perfils->ancho }}</td>
                        <td style="text-align:center;">{{ $perfils->alto }}</td>
                        <td style="text-align:center;">{{ $perfils->repeticion }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('perfil.show',$perfils->id ) }}">
                                <button class="btn btn-success btn-sm"><i class="fa fa-eye"
                                        aria-hidden="true"></i> Ver
                                </button>
                            </a>
                           <!--  <a href="{{ route('perfil.edit', $perfils->id )}}">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"
                                        aria-hidden="true"></i> Editar
                                </button>
                            </a> -->
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection