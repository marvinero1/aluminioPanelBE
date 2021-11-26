@extends('layouts.main')

@section('content')
<div id="areaImprimir">
    <div class="p-3">
        @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
    </div>
    <div class="content pt-3">
         <div id="page-wrap">
        <h4 id="header">Cotización</h4>
        <div id="identity">
            <div style="padding: 6px 28px;">
                <!-- <img height="150px" width="150px" src="{{url('/images/fondos/logo.png')}}" alt="Logo" style="float: left;"> -->
                <div id="address">
                    <h5><strong>Nombre Cliente:</strong> {{ $hoja_calculo_perfil->nombre_cliente }}</h5>
                    <h5><strong>Celular:</strong> {{ $hoja_calculo_perfil->celular }}</h5>
                    <h5><strong>Descripcion:</strong>{{ $hoja_calculo_perfil->descripcion }}</h5>
                </div>
            </div>
        </div>
            <div style="clear:both"></div>
            <div id="customer">
                <table id="meta1">
                    <tr>
                        <td style="text-align: center;" class="meta-head">ID Control</td>
                        <td>
                            <input style="text-align: center;" disabled="true" type="text" class="input" value="{{$id_hoja}}">
                        </td>
                    </tr>
                </table>
                <table id="meta">
                   <!--  <tr>
                        <td class="meta-head">Comprobante*</td>
                        <td><input type="text" value="" class="input" disabled="true"></td>
                    </tr> -->
                    <tr>
                        <td class="meta-head">Fecha *</td>
                        <td>
                            <input type="date"  max="3000-12-31" min="1000-01-01" class="form-control">
                        </td>
                    </tr>
                   <!--  <tr>
                        <td class="meta-head">Descuento *</td>
                        <td>
                            <div class="due">
                                <input id="descuento" value="" type="text" class="input" required>
                            </div>
                        </td>
                    </tr> -->
                   <!--  <tr>
                        <td class="meta-head">Copia</td>
                        <td>
                            <h5 style="letter-spacing: 23px;"><strong>COPIA</strong></h5>  
                        </td>
                    </tr> -->
                </table>
            </div>
            <table id="items">
                <tr>
                    <th style="text-align: center;">Ventanas</th>
                    <th style="text-align: center;"># Ventanas</th>
                    <th style="text-align: center;">MT2</th>
                    <th style="text-align: center;">Precio</th>
                   <!--  <th style="text-align: center;">Precio</th> -->
                    <th style="text-align: center;">Sub-Total</th>
                </tr>
                @foreach($perfil as $perfils)
                <tr class="item-row">    
                    <td class="description">
                        <div class="delete-wpr">
                            <input class="input" type="text" disabled="true" style="text-align: center;" value="{{ $perfils->linea }}">
                        </div>
                    </td>
                    <td class="item-name">
                        <div class="delete-wpr">
                            <input class="input" type="text" style="text-align: center;" disabled="true" value="{{ $perfils->repeticion }}">
                        </div>
                    </td>
                    <td><input class="input" class="cost" disabled="true"value="{{ $mt2  }}" 
                            style="text-align: center;width: 100%;"></td>
                        
                    <td><input class="input" class="cost" disabled="true" value="{{ $perfils->precio }}" 
                            style="text-align: center;width: 100%;">                       
                    </td>
                    <td ><input class="input" class="cost"style="text-align: center;width: 100%;" disabled="true"
                    value="{{ $total }}"></td>

                   <!--  <td><input class="input" style="text-align: center;" disabled="true" type="text" name="total"
                            value=""></td> -->
                         
                </tr>
                 @endforeach  
                <tr>
                    <td colspan="2" class="blank"> </td>
                    <td colspan="2" class="total-line balance">Total:</td>
                    <td class="total-value">
                        <div disabled="true" id="total" style="text-align: center;">
                          {{ $totalTotal }}
                        </div>
                    </td>
                </tr>
            </table>
            <h6 style="text-align: left;padding: 5px;">*Campos Obligatorios</h6>
        <div style="clear:both">
            <br>
            <br>
            <p style="text-align: center;">-----------------------</p>
            <h4 style="text-align: center;">Recibido Conforme</h4>
        </div>
    </div>
    </div>
</div>
<div class="modal-footer">
    <a type="button" class="btn btn-default float-left" href="{{url('/cortadoraPerfil')}}">Cerrar</a>
    <button type="button" class="btn btn-success" onclick="printDiv('areaImprimir')" value="imprimir div">
        <i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
</div>
@endsection
<script>
    function printDiv(nombreDiv) {
        var contenido = document.getElementById(nombreDiv).innerHTML;
        var contenidoOriginal = document.body.innerHTML;
        document.body.innerHTML = contenido;
        window.print();
        document.body.innerHTML = contenidoOriginal;
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