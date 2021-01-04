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
                        <th style="text-align:center;">Categoria</th>
                        <th style="text-align:center;">Nombre Sub-Categoria</th>
                        <th style="text-align:center;">Descripción</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($subcategoria as $categorias)
                    <tr>
                        <td style="text-align:center;">{{ $categorias->categoria->nombre }}</td>
                        <td style="text-align:center;">{{ $categorias->nombre }}</td>
                        <td style="text-align:center;">{{ $categorias->descripcion }}</td>
                        <td style="text-align:center;">
                            <form action="{{ route('categoria.destroy',$categorias->id ) }}" method="POST"
                                accept-charset="UTF-8" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                    onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table><br><br>
        </div>
    </div>
</div>
@endsection