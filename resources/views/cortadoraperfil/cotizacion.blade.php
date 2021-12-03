@extends('layouts.main')

@section('content')
<br><br>
<div id="areaImprimir">
    

<div class="content-wrapper">
@if (Session::has('message'))
  <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
@if (Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif  
<div class="container" id="template_invoice">
    <div class="text-center">
        <h3 id="header">Cotización</h4>
    </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"><br>
            <h5 class="panel-title"><strong>ID Control:</strong>{{ $id_hoja }}</h5>
            <h5 class="panel-title"><strong>Nombre Cliente:</strong>{{ $hoja_calculo_perfil->nombre_cliente }}</h5>
            <h5 class="panel-title"><strong>Celular:</strong> {{ $hoja_calculo_perfil->celular }}</h5>
            <h5 class="panel-title"><strong>Descripción: </strong>{{ $hoja_calculo_perfil->descripcion }}</h5>  
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-condensed table-borderless ">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Lineas o Series</th>
                                <th style="text-align: center;">Cantidad Ventanas</th>
                                <th style="text-align: center;">MT2</th>
                                <th style="text-align: center;">Precio</th>
                                <th style="text-align: center;">Sub-Total</th>
                            </tr>
                       </thead>
                      <tbody>
                        @foreach($perfil as $perfils)
                          <tr class="item-row">
                            <td class="text-center"><label>{{$perfils->linea}}</td></label>
                            <td class="text-center"><label>{{$perfils->repeticion}}</td></label>
                            <td class="text-center"><label><?php
                               
                                      $alto = $perfils->alto;
                                      $ancho = $perfils->ancho;
                                      $resultado = $alto * $ancho;

                                      echo number_format($resultado, 3);
                                    
                            ?></td></label>
                            <td class="text-center"><label>{{$perfils->precio}}</label></td>


                            {{-- Precio unitario --}}
                            {{-- <td class="text-center"><label >Bs.</label><input class="monto input" type="number" value="{{$carrito_detalles->precio}}" ><p id="valueInput1"></p> </td> --}}
                            
                             <td class="text-center"><?php
                               
                                      $alto = $perfils->alto;
                                      $ancho = $perfils->ancho;
                                      $precio = $perfils->precio;
                                      $resultado = $alto * $ancho;
                                      $subtotal = $precio * $resultado;

                                      echo number_format($subtotal, 2);
                                    
                        ?></td>
                            
                              {{-- total --}}
                            <!-- <td class="text-center">
                              <p>{{ $totalTotal }}</p></td> -->
                          </tr>                  
                        @endforeach
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">
                            <strong>{{ number_format($totalTotal,2) }} </strong>
                        </td>
                      </tbody>
                    </table>
                </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
    <div class="modal-footer">
        <a type="button" class="btn btn-default float-left" href="{{url('/cortadoraPerfil')}}"> <i class="fa fa-close" aria-hidden="true"></i>
        Cerrar</a>
         <a href="javascript:pruebaDivAPdf()" id="btnCapturar" class="btn btn-danger"><strong>
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> &nbsp; Pasar a PDF</strong></a>
        <button type="button" class="btn btn-info" onclick="printDiv('areaImprimir')" value="imprimir div">
            <i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
    </div> 
</div>
<script> 
  function printDiv(nombreDiv) {
      var contenido = document.getElementById(nombreDiv).innerHTML;
      var contenidoOriginal = document.body.innerHTML;
      document.body.innerHTML = contenido;
      window.print();
      document.body.innerHTML = contenidoOriginal;
  }

  function pruebaDivAPdf(){
  
     var doc = new jsPDF('p', 'mm', 'b3'),

      source = $("#template_invoice")[0],
      margins = {
        top: 10,
        bottom: 60,
        left: 40,
        width: 522
      };
  
  doc.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top,
    
    {
      // y coord
      width: margins.width // max width of content on PDF
    },
    function(dispose) {
      // dispose: object with X, Y of the last line add to the PDF
      //          this allow the insertion of new lines after html
      doc.save("cotizacion_altools.pdf");
    },
    margins
  );
}
</script>
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
        border: #b2b2b2 1
px
 solid;
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

</style>
@endsection