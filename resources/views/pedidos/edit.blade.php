@extends('layouts.main')

@section('content')
<br><br>
<div class="content-wrapper" id="contenedor">
    <div class="container" id="template_invoice">
        <div class="row">
            <div class="col-xs-4">
                <div class="invoice-title">

                    <h2><img height="50px" width="50px" src="/images/fondos/logo.png" alt="Logo">&nbsp; Cotización de
                        Empresa {{Auth::user()->name}}</h2>
                </div>
            </div>
            <div class="col-xs-4">
                <!-- <button class="btn btn-info pull-right">Download</button> -->
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-6">
                <address>
                    <img height="180px" width="175px" src="{{url(Auth::user()->imagen)}}" alt="Logo"
                        style="float: left;margin-right:  20px;">
                    <strong>Nombre Empresa: </strong>{{Auth::user()->name}}<br>
                    <strong>Dirección: </strong>{{Auth::user()->direccion}}<br>
                    <strong>Teléfono:</strong> {{ Auth::user()->telefono }}<br>
                    <strong>Whatsapp:</strong> {{ Auth::user()->whatsapp }}<br>
                    <strong>Email:</strong> {{ Auth::user()->email }}<br>
                    <strong>Pais:</strong> {{ Auth::user()->pais }}<br>
                    <strong>Ciudad:</strong>{{ Auth::user()->ciudad }}
                </address>
            </div>
            <!-- <div class="col-xs-6 text-right">
      <address>
        <strong>Shipped To:</strong><br>
    		Jane Smith<br>
    		1234 Main<br>
    		Apt. 4B<br>
    		Springfield, ST 54321
    	</address>
    </div> -->
        </div>
        <!-- <div class="row">
    <div class="col-xs-6">
      <address>
    		<strong>Payment Method:</strong><br>
    		Visa ending **** 4242<br>
    		jsmith@email.com
    	</address>
    </div>
    <div class="col-xs-6 text-right">
      <address>
    		<strong>Order Date:</strong><br>
    		March 7, 2014<br><br>
    	</address>
    </div>
  </div> -->
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Codigo Carrito: {{ $carrito->id}}</strong></h3>
                        <h3 class="panel-title"><strong>Descripción: </strong></h3>
                        <h5>{{ $carrito->descripcion}}</h5>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">


                            {{-- <table class="table table-condensed">
              <thead>
              	<!-- <div class="col-xs-4">
			          <p class="lead">Order # {{12345}}</p>
                        </div> -->
                        <tr>
                            <td><strong>Codigo</strong></td>
                            <td class="text-center"><strong>Nombre</strong></td>
                            <!-- <td class="text-center"><strong>Descripcion</strong></td> -->
                            <td class="text-center"><strong>Color</strong></td>
                            <td class="text-center"><strong>Cantidad</strong></td>
                            <td class="text-center"><strong>Precio Unitario</strong></td>
                            <td class="text-center"><strong>Total</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($carrito_detalle as $carrito_detalles)
                            <tr class="item-row">
                                <td class="text-center"><label>{{$carrito_detalles->codigo}}</td></label>
                                <td class="text-center"><label>{{$carrito_detalles->nombre}}</label></td>
                                <!-- <td class="text-center"><label>{{$carrito_detalles->descripcion}}</td></label> -->
                                <td class="text-center"><label>{{$carrito_detalles->color}}</td></label>
                                <td class="text-center"><label>{{$carrito_detalles->cantidad_pedido}}</label>
                                    <input disabled="true" name="cantidad" id="cantidadjs"
                                        value="{{$carrito_detalles->cantidad_pedido}}"> </td>

                                <!-- @for ($i = $tamanio ; $i <= $tamanio ; $i++)
                         
                        @endfor -->
                                <td class="text-center"><input type="number" id="precio"><label>
                                        <p id="valueInput"></p>Bs.
                                    </label> </td>
                                <td class="text-center"><label>
                                        <p id="valueInput1"></p>Bs.</td>
                                </label>
                            </tr>
                            @endforeach

                        </tbody>
                        </table> --}}

                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center"><strong>Codigo</strong></th>
                                    <th class="text-center"><strong>Nombre</strong></th>
                                    <th class="text-center"><strong>Color</strong></th>
                                    <th class="text-center"><strong>Cantidad</strong></th>
                                    <th class="text-center"><strong>Precio Unitario</strong></th>
                                    <th class="text-center"><strong>Total</strong></th>
                                    <th class="text-center"><strong>Accion</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carrito_detalle as $carrito_detalles)
                                <tr class="item-row">
                                    <td class="text-center"><label>{{$carrito_detalles->codigo}}</td></label>
                                    <td class="text-center"><label><a class="btn btn-app" data-toggle="modal"
                                                data-target="#modalFavoritos{{$carrito_detalles->id}}"
                                                class="btn btn-danger btn-sm">
                                                {{$carrito_detalles->nombre}}
                                            </a></label></td>
                                    <td class="text-center"><label>{{$carrito_detalles->color}}</td></label>
                                    <td class="text-center"><label>{{$carrito_detalles->cantidad_pedido}}</label>
                                        <input disabled="true" class="monto input" hidden="true"
                                            value="{{$carrito_detalles->cantidad_pedido}}"> </td>

                                    {{-- Precio unitario --}}
                                    {{-- <td class="text-center"><label >Bs.</label><input class="monto input" type="number" value="{{$carrito_detalles->precio}}"
                                    ><p id="valueInput1"></p>
                                    </td> --}}
                                    <td class="text-center">
                                        {{-- <input class="monto input" type="number" value="{{$carrito_detalles->precio}}"
                                        disabled> --}}
                                        <p>{{$carrito_detalles->precio}}Bs.</p>
                                    </td>

                                    {{-- total --}}
                                    <td>
                                        <p>{{ $carrito_detalles->precio * $carrito_detalles->cantidad_pedido}}</p> Bs.
                                    </td>
                                    <td>
                                        <!-- Button trigger Confirmacion -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#exampleModalEditarPrecio{{$carrito_detalles->id}}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Editar Precio
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Confirmacion -->
                                <div class="modal fade" id="exampleModalEditarPrecio{{$carrito_detalles->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="width:67%;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Precio Unitario
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('carritoDetalle.update', $carrito_detalles->id )}}" method="POST"
                                                    enctype="multipart/form-data"
                                                    style="margin-block-end:-1em !important;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <div class="col-md-12 p-2">
                                                        <div class="form-group">
                                                            <label>Precio Unitario</label>
                                                            <input type="number" step="0.01" class="form-control" placeholder="Precio" name="precio">
                                                        </div>
                                                      
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">
                                                                <i class="fa fa-close" aria-hidden="true"></i>
                                                                Cancelar</button>
                                                            <button type="submit" class="btn btn-success mr-2"><i
                                                                    class="fa fas fa-save"></i> Guardar</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <tr>
                                    <td class="text-center">--**--</td>
                                    <td class="text-center">--**--</td>
                                    <td class="text-center">--**--</td>
                                    <td class="text-center">--**--</td>
                                    <td class="text-center">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="text-center">
                                        <input type="text" class="monto totales" value="0" id="sumaTotal" hidden="true"
                                            disabled>
                                        <p id="sumaTotalview"></p>Bs.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <a href="javascript:multiplica()" class="btn btn-light" style="float: right;">
                <strong><label><i class="fa fa-calculator" aria-hidden="true"></i>
                &nbsp; Calcular</label></strong>
            </a>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <a type="button" class="btn btn-default" href="{{url('/pedido')}}" style="float-left;">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Cerrar
    </a>
</div>
</div>
@endsection

<style>
    .input {
        border: 0 !important;
    }

    #hiderow,
    .delete {
        display: none;
    }

    * {
        margin: 0;
        padding: 0;
    }

    body {
        font: 14px/1.4 Georgia, serif;
    }

    #page-wrap {
        width: 800px;
        margin: 0 auto;
        background: white;
    }

    textarea {
        border: 0;
        font: 14px Georgia, Serif;
        overflow: hidden;
        resize: none;
    }

    table {
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
        padding: 5px;

    }

    #header {
        width: 100%;
        margin: 20px 0;
        text-align: center;
        color: #222;
        font: bold 15px Helvetica, Sans-Serif;
        text-decoration: uppercase;
        letter-spacing: 20px;
        padding: 30px;
    }

    #address {
        padding: 10px;
        width: 250px;
        height: 150px;
        float: left;
    }

    #customer {
        overflow: hidden;
        padding: 27px;
    }

    #logo {
        text-align: right;
        float: right;
        position: relative;
        margin-top: 25px;
        border: 1px solid #fff;
        max-width: 540px;
        max-height: 100px;
        overflow: hidden;
    }

    #logo:hover,
    #logo.edit {
        border: 1px solid #000;
        margin-top: 0px;
        max-height: 125px;
    }

    #logoctr {
        display: none;
    }

    #logo:hover #logoctr,
    #logo.edit #logoctr {
        display: block;
        text-align: right;
        line-height: 25px;
        background: #eee;
        padding: 0 5px;
    }

    #logohelp {
        text-align: left;
        display: none;
        font-style: italic;
        padding: 10px 5px;
    }

    #logohelp input {
        margin-bottom: 5px;
    }

    .edit #logohelp {
        display: block;
    }

    .edit #save-logo,
    .edit #cancel-logo {
        display: inline;
    }

    .edit #image,
    #save-logo,
    #cancel-logo,
    .edit #change-logo,
    .edit #delete-logo {
        display: none;
    }

    #customer-title {
        font-size: 20px;
        font-weight: bold;
        float: left;
    }

    #meta {
        margin-top: 1px;
        width: 300px;
        float: right;
    }

    #meta1 {
        margin-top: 1px;
        width: 300px;
        float: left;
    }

    #meta td {
        text-align: right;
    }

    #meta td.meta-head {
        text-align: left;
        background: #eee;
    }

    #meta td textarea {
        width: 100%;
        height: 20px;
        text-align: right;
    }

    #items {
        clear: both;
        width: 100%;
        margin: 30px 0 0 0;
        border: 1px solid black;
    }

    #items th {
        background: #eee;
    }

    #items textarea {
        width: 80px;
        height: 50px;
    }

    #items tr.item-row td {
        border: 0;
        vertical-align: top;
    }

    #items td.description {
        width: 300px;
    }

    #items td.item-name {
        width: 175px;
    }

    #items td.description textarea,
    #items td.item-name textarea {
        width: 100%;
    }

    #items td.total-line {
        border-right: 0;
        text-align: right;
    }

    #items td.total-value {
        border-left: 0;
        padding: 10px;
    }

    #items td.total-value textarea {
        height: 20px;
        background: none;
    }

    #items td.balance {
        background: #eee;
    }

    #items td.blank {
        border: 0;
    }

    #terms {
        text-align: center;
        margin: 20px 0 0 0;
    }

    #terms h5 {
        text-transform: uppercase;
        font: 13px Helvetica, Sans-Serif;
        letter-spacing: 10px;
        border-bottom: 1px solid black;
        padding: 0 0 8px 0;
        margin: 0 0 8px 0;
    }

    #terms textarea {
        width: 100%;
        text-align: center;
    }

    textarea:hover,
    textarea:focus,
    #items td.total-value textarea:hover,
    #items td.total-value textarea:focus,
    .delete:hover {
        background-color: #EEFF88;
    }

    .delete-wpr {
        position: relative;
    }

    .delete {
        display: block;
        color: #000;
        text-decoration: none;
        position: absolute;
        background: #EEEEEE;
        font-weight: bold;
        padding: 0px 3px;
        border: 1px solid;
        top: -6px;
        left: -22px;
        font-family: Verdana;
        font-size: 12px;
    }

</style>
