@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Registro Productos</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row" style="border: outset;">
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label><strong>Categoria *</strong> </label>
                                            <select name="categorias_id" class="form-control selectpicker"
                                                data-live-search="true" required>
                                                @foreach ($categoria as $categorias)
                                                <option value="{{ $categorias->id }}">{{$categorias->nombre}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label><strong>Sub Categoria *</strong> </label>
                                            <select name="subcategorias_id" class="form-control selectpicker"
                                                data-live-search="true" required>
                                                @foreach ($subcategoria as $subcategorias)
                                                <option value="{{ $subcategorias->id }}">{{$subcategorias->nombre}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Producto</label>
                                            <input type="text" class="form-control" name="nombre"
                                                placeholder="Nombre Artículo" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <input type="number" class="form-control" placeholder="Precio" name="precio">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                            <label>Importadora</label>
                                            <input type="text" class="form-control" name="importadora" readonly
                                            value="{{Auth::user()->name}}">
                                        </div> 
                                    </div>
                                    
                                </div>
                                <div class="row">
                                                                
                                        
                                    <div class="col-md-4 text-center">
                                        <label class="text-center">Estado</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="Disponible" name="estado">
                                            <label class="form-check-label" for="inlineCheckbox1">Disponible</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="No-Disponible" name="estado">
                                            <label class="form-check-label" for="inlineCheckbox2">No Disponible</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="Pendiente" name="estado">
                                            <label class="form-check-label" for="inlineCheckbox3">Pendiente</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-sm text-center">
                                            <label>Calificacion del Producto</label>
                                            <p class="clasificacion">
                                                <input id="radio11" type="radio"
                                                name="puntuacion" value="5">
                                                <label for="radio11" class="label1">★</label>
                                                <input id="radio22" type="radio"
                                                name="puntuacion" value="4">
                                                <label for="radio22" class="label1">★</label>
                                                <input id="radio33" type="radio"
                                                name="puntuacion" value="3">
                                                <label for="radio33" class="label1">★</label>
                                                <input id="radio44" type="radio"
                                                name="puntuacion" value="2">
                                                <label for="radio44" class="label1">★</label>
                                                <input id="radio55" type="radio"
                                                name="puntuacion" value="1">
                                                <label for="radio55" class="label1">★</label>
                                            </p>
                                        </div>
                                    </div>  
                                    <div class="col-md-2">
                                       <div class="form-group">
                                            <label>Medida</label>
                                            <input type="text" class="form-control" placeholder="Medida" name="medida" required>
                                        </div>   
                                    </div>
                                    <div class="col-md-2">
                                        <label>Tipo Medida</label>
                                        <select class="custom-select" id="inputGroupSelect01"  name="tipo_medida" required>
                                            <option selected>Selecciona...</option>
                                            <option value="kilometro">Kilómetro</option>
                                            <option value="metro">Metro</option>
                                            <option value="centímetro">Centímetro</option>
                                            <option value="pulgada">Pulgadas</option>
                                            <option value="gramo">Gramo</option>
                                            <option value="kilogramo">Kilogramo</option>
                                            <option value="centigramo">Centigramo</option>
                                            <option value="miligramo">Miligramo</option>
                                            <option value="litro">Litro</option>
                                            <option value="decalitro">Decalitro</option>
                                            <option value="centilitro">Centilitro</option>
                                            <option value="mililitro">Mililitro</option>
                                        </select>  
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                        <p><strong>Imagen</strong></p>
                                        <label for="file-upload" class="custom-file-upload" style="text-align: center;">
                                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                        <strong>Imagen</strong>
                                        </label>
                                        <p><strong>Sugerencia:</strong> Para una mejor visualizacion se recomienda
                                        resolucion a partir de<strong> 1024 × 768 pixels</strong></p>
                                        <input id="file-upload" type="file" name="imagen">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <textarea class="form-control" name="descripcion" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a type="button" class="btn btn-secondary float-right"
                                    href="{{url('/productos')}}">Cerrar</a>
                                <button type="submit" class="btn btn-primary float-right mr-2">Guardar</button>
                            </div>
                        </form>
                    </div>
    </section>
    
</div>

<style>
    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        width: 100%;
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }

    .container-fluid {
        padding-block-start: 20px;
    }

    .mtform {
        width: 100%;
    }

    table {
        width: 100%;
    }

    h3 {
        margin-block-end: 0em !important;
    }

    h5 {
        color: darkgray;
    }

    .mat-sort-header {
        text-align: center;
    }

    td {
        text-align: center;
    }

    .clasificacion {
        direction: rtl;
        unicode-bidi: bidi-override;
    }

    label:hover,
    label:hover~label {
        color: orange;
    }

    input[type="radio"]:checked~label {
        color: orange;
    }

    input[type="radio"] {
        display: none;
    }

    .label1 {
        padding-right: 3px;
        color: grey;
        font-size: 35px;
        margin-bottom: 3.0rem !important;
    }

    p,
    h4 {
        text-align: center;
    }

    ::ng-deep .mat-snack-bar-container {
        color: #155724 !important;
        background-color: #d4edda !important;
        border-color: #c3e6cb !important;
    }

    ::ng-deep .mat-simple-snackbar-action {
        color: #02e896;
    }

</style>
@endsection
