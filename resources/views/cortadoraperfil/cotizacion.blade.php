@extends('layouts.main')

@section('content')
<div class="content-wrapper" id="areaImprimir">
    @if (Session::has('message'))
      <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif  
        <div class="container" style="padding-block-start: 5px;" id="template_invoice"><br><br><br><br>
            <div class="text-center">
                <p id="header" style="font-size: 1.7rem;">
                    <strong>COTIZACION</strong></p>
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
                <div class="panel-body"style="padding-block-start: 55px;">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-condensed table-borderless" style="font-size:1.2rem">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Lineas o Series</th>
                                        <th style="text-align: center;">MT2</th>
                                        <th style="text-align: center;">Precio</th>
                                        <th style="text-align: center;">Sub-Total</th>
                                    </tr>
                               </thead>
                              <tbody>
                                @if($barraL20Alto != null)
                                    <tr>
                                        <td class="text-center"><label>Linea 20</label></td>
                                        <td class="text-center"><label>{{ number_format($mt2Total,2) }}</label>
                                                                            
                                        <input hidden="true" type="text" name="mt2" value="{{ $mt2Total }}" id="mt2">
                                        </td>
                                        <td class="text-center"><label id="precio_view"></label>
                                            <input type="number" id="precio" name="precio" style="width: 25%;">
                                        </td>
                                        <td class="text-center">
                                             <strong><label id="sub-total"></label></strong>  
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-center"><label>Linea 20</label></td>
                                        <input hidden="true" type="text" name="mt2" value="0" id="mt2">
                                        <td class="text-center"><label>0</label></td>
                                        <td class="text-center"><label id="precio_view"></label>
                                            <input disabled type="number" id="precio" value="0" name="precio" style="width: 25%;">
                                        </td>
                                        <td class="text-center">
                                             <strong><label id="sub-total"></label></strong>
                                        </td>
                                    </tr>
                                @endif
                                @if($barraL25Alto != null)
                                    <tr>
                                        <td class="text-center"><label>Linea 25</label></td>
                                        <td class="text-center"><label>{{ number_format($mt2Total25,2) }}</label>
                                        <input hidden="true" type="text" name="mt2L25" value="{{ $mt2Total25 }}" 
                                         id="mt2L25"></td>
                                        <td class="text-center"><label id="precio_view25"></label>
                                            <input type="number" id="precioL25" name="precioL25" style="width: 25%;">
                                        </td>
                                        <td class="text-center"> <strong><label id="sub-total25"></label></strong></td>
                                    </tr>
                                @else
                                <tr>
                                    <td class="text-center"><label>Linea 25</label></td>
                                    <td class="text-center"><label>0</label></td>
                                    <input hidden="true" type="text" name="mt2L25" value="0" id="mt2L25"></td>
                                    <input hidden="true" type="text" name="repeticion25" value="0" id="repeticion25">
                                    <td class="text-center"><label id="precio_view25"></label>
                                        <input disabled type="number" id="precioL25" name="precioL25" value="0" style="width: 25%;">
                                    </td>
                                    <td class="text-center"> <strong><label id="sub-total25"></label></strong></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total: &nbsp;</strong><label id="totalTotal"></label></td>
                                </tr> 
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
    <a type="button" class="btn btn-default float-left" href="{{url('/cortadoraPerfilHistorial')}}"> <i class="fa fa-close" aria-hidden="true"></i>
    Cerrar</a>
    <button type="button" class="btn btn-warning" onclick="calcular()" >
    <i class="fa fa-calculator" aria-hidden="true"></i> Calcular</button>
    <button type="button" class="btn btn-info" onclick="printDiv('areaImprimir')" value="imprimir div">
        <i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
    
</div> 
<script>
    function calcular(){
        let mt2 = document.getElementById('mt2').value;
        mt2 = parseFloat(mt2).toFixed(5);
        let precio = document.getElementById('precio').value;
        

        console.log(mt2, precio);
        let subtotal = precio * mt2;

        subtotal = parseFloat(subtotal).toFixed(2);
        document.getElementById('sub-total').innerHTML = subtotal;
        console.log(subtotal);

        // precio = parseFloat(precio).toFixed(2);
        document.getElementById('precio_view').innerHTML = precio;
       
        let mt2L25 = document.getElementById('mt2L25').value;
        // mt2L25 = parseFloat(mt2L25).toFixed(2);

        let precioL25 = document.getElementById('precioL25').value;
        precioL25 = parseFloat(precioL25).toFixed(2);
        
        console.log(mt2L25, precioL25);

        let subtotal25 = precioL25 * mt2L25;

        subtotal25 = parseFloat(subtotal25).toFixed(2);
        document.getElementById('sub-total25').innerHTML = subtotal25;
        
        document.getElementById('precio_view25').innerHTML = precioL25;
        precioL25 = parseFloat(precioL25).toFixed(2);
        // console.log(subtotal , subtotal25);

        let totalTotal = parseFloat(subtotal) + parseFloat(subtotal25);
        // console.log(totalTotal);

        totalTotal = parseFloat(totalTotal).toFixed(2);
        document.getElementById('totalTotal').innerHTML = totalTotal;  
    }

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