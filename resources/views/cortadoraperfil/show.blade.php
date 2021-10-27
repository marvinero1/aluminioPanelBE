@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Perfiles y Combinaciones</h1>
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
                        <th style="text-align:center;">Nombre</th>
                        <th style="text-align:center;">Combinación</th>
                        <th style="text-align:center;">Linea</th>
                        <!-- <th style="text-align:center;">Descripción</th> -->
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perfil as $perfils)
                    <tr>
                        <td style="text-align:center;">{{ $perfils->id }}</td>
                        <td style="text-align:center;">{{ $perfils->combinacion }}</td>
                        <td style="text-align:center;">{{ $perfils->categoria }}</td>
                       
                        <td style="text-align:center;">
                            <a href="{{ route('perfil.show',$perfils->id ) }}">
                                <button class="btn btn-success btn-sm"><i class="fa fa-eye"
                                        aria-hidden="true"></i> Ver
                                </button></a>
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
            </table><br><br>
        </div>
            <div style="text-align: center !important;" class="justify-content-center">
                
            </div>
    </div>
</div>
@endsection