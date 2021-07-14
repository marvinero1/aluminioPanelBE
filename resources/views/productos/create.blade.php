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
                                            <label for="nombre">Código Producto *</label>
                                            <input type="text" class="form-control" name="codigo"
                                                placeholder="Código Artículo" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label><strong>Categoria *</strong> </label>
                                            <select name="categorias_id" class="form-control select2"
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
                                            <select name="subcategorias_id" class="form-control select2"
                                                data-live-search="true" required>
                                                @foreach ($subcategoria as $subcategorias)
                                                <option value="{{ $subcategorias->id }}">{{$subcategorias->nombre}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label>Seleccione en que ciudad esta disponible el producto</label>
                                            <div class="select2-dark">
                                                <select class="select2" data-dropdown-css-class="select2-dark"
                                                data-placeholder="Seleccione ciudades" style="width: 100%;"
                                                 name="disponibilidad">
                                                    <option value="La-Paz">La Paz</option>
                                                    <option value="El-Alto">El Alto</option>
                                                    <option value="Cochabamba">Cochabamba</option>
                                                    <option value="Santa-Cruz">Santa Cruz</option>
                                                    <option value="Oruro">Oruro</option>
                                                    <option value="Potosi">Potosi</option>
                                                    <option value="Chuquisaca">Chuquisaca</option>
                                                    <option value="Tarija">Tarija</option>
                                                    <option value="Pando">Pando</option>
                                                    <option value="Beni">Beni</option>
                                                </select>
                                            </div>
                                          </div>
                                        </div>
                                    &nbsp;&nbsp;&nbsp;<lable>Los campos marcados con (*) son requeridos</lable><br>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Producto *</label>
                                            <input type="text" class="form-control" name="nombre"
                                                placeholder="Nombre Artículo" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <input type="number" step="0.01" class="form-control" placeholder="Precio" name="precio">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                                                   
                                            <label>Color</label>
                                            <div class="select2-dark">
                                                 <select class="select2" multiple="multiple" 
                                                    data-dropdown-css-class="select2-dark"
                                                    data-placeholder="Seleccione Colores" style="width: 100%;"
                                                     name="color[]"> 
                                                    <option value="Natural">Natural</option>
                                                    <option value="Titanio">Titanio</option>                                         
                                                    <option value="Champagne">Champagne</option>                          
                                                    <option value="Bronce">Bronce</option>                                          
                                                    <option value="Negro">Negro</option>                                            
                                                    <option value="Blanco">Blanco</option>                                         
                                                    <option value="Madera">Madera</option>                                          
                                                    <option value="Rojo">Rojo</option>
                                                    <option value="Verde">Verde</option>
                                                    <option value="Azul">Azul</option>
                                                    <option value="Amarillo">Amarillo</option>
                                                    <option value="Plomo">Plomo</option>
                                                    <option value="Rosado">Rosado</option>
                                                    <option value="Turquesa">Turquesa</option>
                                                    <option value="Cafe">Cafe</option>
                                                    <option value="Violeta">Violeta</option>
                                                    <option value="Naranja">Naranja</option>
                                                </select>
                                            </div> 
                                        </div> 
                                    </div>
                                    
                                </div>
                                <div class="row">                          
                                    <!-- <div class="col-md-4 text-center">
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
                                    </div> -->

                                   

                                    <div class="col-md-6">
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
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <textarea class="form-control" name="descripcion" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <input hidden type="text" value="{{Auth::user()->id}}" name="user_id">

                                    <input hidden type="text" value="false" name="confirmacion">

                                    <input type="text" class="form-control" name="importadora" readonly hidden="true" 
                                            value="{{Auth::user()->name}}">
                                </div>
                            <p>
  
                              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-glass" aria-hidden="true"></i>
                                Vidrio
                              </button>
                              <p>* Este formulario es exclusivamente para vidrios y afines.</p>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                           <div class="form-group">
                                                <label>Alto</label>
                                                <div>* Solo para vidrio</div>
                                                <input type="number" step="0.01" class="form-control" placeholder="Altura" name="alto">
                                            </div> 
                                            <div class="form-group">
                                                <label>Ancho</label>
                                                <div>* Solo para vidrio</div>
                                                <input type="number" step="0.01" class="form-control" placeholder="Ancho" name="ancho">
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <label>Tipo Medida</label>
                                            <select class="select2" id="inputGroupSelect01"  name="tipo_medida" required>
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
                                </div>
                            </div>
                            <div class="card-footer">
                                <a type="button" class="btn btn-secondary float-right"
                                    href="{{url('/mis-productos')}}">Cerrar</a>
                                <button type="submit" class="btn btn-primary float-right mr-2"><i class="fa fas fa-save"></i> Guardar</button>
                            </div>
                        </form>
                    </div>
    </section>
</div>

<style>
    .select2{
        width: 100%;
    }
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
