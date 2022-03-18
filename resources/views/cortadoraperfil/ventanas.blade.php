<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cortadora de Perfil de Aluminio</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <link href="favicon.ico" rel="icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Altools
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <!-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif -->
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</head>

    <body>
        <nav class="p-2"> 
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Hoja 1</a>
                {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Hoja 2</a> --}}
                <a class="nav-item nav-link" id="nav-res-tab" data-toggle="tab" href="#nav-res" role="tab" aria-controls="nav-res" aria-selected="false">Hoja 2</a>
              </div>
        </nav>
        
        <!-- HOJA1 -->
        <div class="tab-content p-2" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="float-right p-2">
                <a href="/cortadoraPerfil" class="btn btn-warning">Atras</a>
            </div>
            <div class="float-left p-2">
                <button type="button" class="btn btn-success" onclick="printDiv('areaImprimir')" value="imprimir div">
                <i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
            </div><br><br>
                <div class="tab-content p-3" id="areaImprimir">
                    <div class="col-md-6">
                        <div class="row">
                            <p><strong>Nombre Cliente: </strong></p> {{ $nombre_cliente }}  
                        </div>
                    </div>
                <div class="col">
                    <div class="class">
                        <p><strong>Resumen</strong></p>   
                        <table class="table-responsive-sm" border="1">
                          <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Ventanas</th>
                                <th scope="col" class="text-center">Codigo</th>
                                <th scope="col" class="text-center">Nombre</th>
                                <th scope="col" class="text-center">Descuento</th>
                                <th scope="col" class="text-center">Piezas</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($perfil as $perfils)
                                <tr>
                                    <td scope="row">{{ $perfils->repeticion }}</td>
                                    <td style="display:block;" width="335" nowrap><?php  
                                         //aca el elperfil (barra al)categorias junto a el corte
                                        $id_perfil =  $perfils->id;
                                        $repetecion = $perfils->repeticion;
                                        $familia = $perfils->linea;
                                        $cadena = "V";
                                        $ancho = $perfils->ancho * 1000;
                                        $alto = $perfils->alto * 1000;
                                        $combinacion = $perfils->combinacion;
                                        
                                        // $cortes_json = json_encode($corte_1);
                                        for ($x = 1; $x <= $repetecion; $x++){
                                            if ($combinacion == 'combinacion1') {
                                                echo "<div class='float-right pr-2' style='padding-top:50px;'>$alto</div>";

                                                echo $cadena.$x."\n".$familia."\n".'<img src="/images/cortadora/corteCombi2.png" width="200px">'."\n".'<div class="text-center">'.$ancho.'</div>';
                                            } elseif ($combinacion == 'combinacion4') {
                                                echo "<div class='float-right pr-2' style='padding-top:50px;'>$alto</div>";

                                                echo $cadena.$x."\n".$familia."\n".'<img src="/images/cortadora/combinacion4_1.png" width="200px">'."\n".'<div class="text-center">'.$ancho.'</div>';
                                            } else {
                                                echo "<div class='float-right pr-2' style='padding-top:50px;'>$alto</div>";

                                                echo $cadena.$x."\n".$familia."\n".'<img src="/images/cortadora/combinacion5_1.png" width="200px">'."\n".'<div class="text-center">'.$ancho.'</div>';
                                            }
                                            // echo $familia."\n".'<img src="/images/cortadora/corteCombi2.png" width="200px">'."\n".'<div class="text-center">'.$ancho.'</div>';

                                            // echo "\n".$ancho;
                                        }
                                        $descripcion = $perfils->descripcion;
                                        echo "<textarea rows='3' cols='40' disabled>$descripcion</textarea>"; 
                                    ?></td>
                                    
                                    <td class="text-center">
                                        <?php
                                        foreach ($barra as $barras){
                                        $barra_perfil_id = $barras->perfil_id;
                                            if($id_perfil == $barra_perfil_id){
                                                $fam_linea = $barras->fam_linea;
                                                                                       
                                                echo "<p>$fam_linea</p>";
                                                       
                                            }
                                        }?>
                                    </td>   
                                    <td class="text-center">
                                        <?php
                                        foreach ($barra as $barras){
                                        $barra_perfil_id = $barras->perfil_id;
                                            if($id_perfil == $barra_perfil_id){
                                                $fam_linea = $barras->fam_linea;
                                                $nombre = $barras->nombre;
                                                                                                               
                                                echo "<p>$nombre</p>";
                                            }
                                        }?>
                                    </td> 
                                    <td class="text-center">
                                        <?php
                                        foreach ($barra as $barras){
                                        $barra_perfil_id = $barras->perfil_id;
                                            if($id_perfil == $barra_perfil_id){
                                                $restado = $barras->restado;
                                                $restado = number_format($restado,3);
                                                echo "<p>$restado</p>";                                                   
                                            }
                                        }?>
                                    </td> 
                                    <td class="text-center">

                                        <?php
                                        foreach ($barra as $barras){
                                        $barra_perfil_id = $barras->perfil_id;
                                            if($id_perfil == $barra_perfil_id){
                                                $fam_linea = $barras->fam_linea;
                                                $nombre = $barras->nombre;
                                                $ancho = $barras->largo;
                                                $resta = $barras->resta;
                                                $piezas = $barras->piezas;
                                                $restaRecorte =  $ancho - $resta;

                                                $piezas = $barras->piezas;

                                                $piezas_repeticiones = $piezas * $repetecion;
                                                echo  "<p>$piezas_repeticiones</p>";   
                                            }
                                        }?>
                                    </td> 
                                </tr>
                            @endforeach                      
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- HOJA3 -->
        <div class="tab-pane fade" id="nav-res" role="tabpanel" aria-labelledby="nav-res-tab">
            <div class="float-right p-1">
                <a href="/cortadoraPerfil" class="btn btn-warning">Atras</a>
            </div>
            <div class="float-left p-3">
                <button type="button" class="btn btn-success" onclick="printDiv2('areaImprimir2')" value="imprimir div">
                <i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
            </div><br><br>

            <div class="tab-content p-4" id="areaImprimir2">
                <div class="col-md-6">
                    <div class="row">
                        <p><strong>Nombre Cliente: </strong></p> {{ $nombre_cliente }} 
                    </div>
                </div>
                <div class="class p-4">
                    <div class="row">
                        <!-- <div class="col-6"> -->
                            @if(count($barra2001) > 0)
                           <!--  <p><strong>Resumen Linea 20</strong></p> -->
                            <table class="table-responsive-md" border="2" style="width: 82%;">
                                <thead>
                                    <tr  class="bg-info">
                                        <th scope="col" class="text-center">Linea</th>
                                        <th scope="col" class="text-center" colspan="3">Nombre</th>
                                        <th scope="col" class="text-center" colspan="2">Barras</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    <tr>
                                        <td scope="row" class="size">2001</td>
                                        <td scope="row" colspan="3" class="size">Riel Superior</td>
                                        <td scope="row" colspan="2" class="size text-center" ><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2001 as $barra2001s) {
                                                $restado = $barra2001s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2001s->piezas;
                                                $piezas_repeticiones2001 = $piezas * $repeteciones;
                                                $totalMts = $piezas_repeticiones2001 * $restaSuma;

                                                $totalSumado += $totalMts;
                                                 
                                            }
                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                              echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                        ?></td>
                                    </tr>

                                    <tr>
                                        <td scope="row" class="size">2002</td>
                                        <td scope="row" colspan="3" class="size">Riel Inferior</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2002 as $barra2002s) {
                                                $restado = $barra2002s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2002s->piezas;
                                                $piezas_repeticiones2002 = $piezas * $repeteciones;
                                                $totalMts = $piezas_repeticiones2002 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }

                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                                echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                            ?></td> 
                                    </tr>

                                    <tr>
                                        <td scope="row" class="size">2005</td>
                                        <td scope="row" colspan="3" class="size">Zocalo</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2005 as $barra2005s) {
                                                $restado = $barra2005s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2005s->piezas;
                                                $piezas_repeticiones2005 = $piezas * $repeteciones;
                                                $totalMts = $piezas_repeticiones2005 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }

                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                              echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                        ?></td> 
                                    </tr>
                                    <tr>
                                        <td scope="row" class="size">2009</td>
                                        <td scope="row" colspan="3" class="size">Jamba</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2009 as $barra2009s) {
                                                $restado = $barra2009s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2009s->piezas;
                                                $piezas_repeticiones2009 = $piezas * $repeteciones;
                                                $totalMts = $piezas_repeticiones2009 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }
                                            
                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                              echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                        ?></td> 
                                    </tr>

                                    <tr>
                                        <td scope="row" class="size">2010</td>
                                        <td scope="row" colspan="3" class="size">Pierna</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2011 as $barra2011s) {
                                                $restado = $barra2011s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2011s->piezas;
                                                $piezas_repeticiones2011 = $piezas * $repeteciones;

                                                $totalMts = $piezas_repeticiones2011 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }
                                            
                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                                echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                                echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                                echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                                echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                                echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                                echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                                echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                                echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                                echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                                echo "11"; 
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                                echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                                echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                                echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                            ?></td>  
                                    </tr>

                                    <tr>
                                        <td scope="row" class="size">2011</td>
                                        <td scope="row" colspan="3" class="size">Enganche</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                        $totalSumado = 0;
                                        $suma = 0.004;
                                      
                                        foreach ($barra2011 as $barra2011s) {
                                            $restado = $barra2011s->restado;
                                            $restaSuma = $restado + $suma;
                                            $piezas = $barra2011s->piezas;
                                            $piezas_repeticiones2011 = $piezas * $repeteciones;
                                            $totalMts = $piezas_repeticiones2011 * $restaSuma;

                                            $totalSumado += $totalMts;
                                        }
                                        
                                        if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                            echo "1";
                                        }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                          echo "2";  
                                        }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                          echo "3";  
                                        }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                          echo "4";  
                                        }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                          echo "5";  
                                        }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                          echo "6";  
                                        }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                          echo "7";  
                                        }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                          echo "8";  
                                        }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                          echo "9";  
                                        }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                          echo "10";  
                                        }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                          echo "11";  
                                        }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                          echo "12";  
                                        }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                          echo "13";  
                                        }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                          echo "14";  
                                        }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                          echo "15";  
                                        }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                          echo "16";  
                                        }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                          echo "17";  
                                        }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                          echo "18";  
                                        }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                          echo "19";  
                                        }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                          echo "20";  
                                        }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                          echo "21";  
                                        }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                          echo "22";  
                                        }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                          echo "23";  
                                        }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                          echo "24";  
                                        }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                          echo "25";  
                                        }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                          echo "26";  
                                        }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                          echo "27";  
                                        }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                          echo "28";  
                                        }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                          echo "29";  
                                        }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                          echo "30";  
                                        }
                                    ?></td>  
                                    </tr>

                                    @if(count($barra5008) > 0)
                                        <tr>
                                            <td scope="row" class="size">5008</td>
                                            <td scope="row" colspan="3" class="size">Union</td>
                                         <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach($barra5008 as $barra5008s) {
                                                $restado = $barra5008s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra5008s->piezas;
                                                $piezas_repeticiones5008 = $piezas * $repeteciones;
                                                $totalMts = $piezas_repeticiones5008 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }
                                            
                                            if($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                              echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                            ?></td> 
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            @endif
                        <!-- </div> --> 
                    </div><br><br>
                    <div class="row">
                          <!--<div class="col-6"> -->
                            @if(count($barra2501) > 0)
                            <!-- <p><strong>Resumen Linea 25</strong></p>    -->
                            <table class="table-responsive-md" border="2" style="width: 82%;">
                                <thead>
                                    <tr class="bg-info">
                                        <th scope="col" class="text-center">Codigo</th>
                                        <th scope="col" class="text-center" colspan="3">Nombre</th>
                                        <th scope="col" class="text-center">Barras</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td scope="row" class="size">2501</td>
                                        <td scope="row" colspan="3" class="size">Riel Superior</td>
                                         <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2501 as $barra2501s) {
                                                $restado = $barra2501s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2501s->piezas;
                                                $piezas_repeticiones2501 = $piezas * $repeteciones;

                                                $totalMts = $piezas_repeticiones2501 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }

                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                              echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                            ?></td> 
                                    </tr> 

                                    <tr>
                                        <td scope="row" class="size">2502</td>
                                        <td scope="row" colspan="3" class="size">Riel Inferior</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2502 as $barra2502s) {
                                                $restado = $barra2502s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2502s->piezas;
                                                $piezas_repeticiones2502 = $piezas * $repeteciones;

                                                $totalMts = $piezas_repeticiones2502 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }
                                            
                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                              echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                    ?></td> 
                                    </tr>    

                                    <tr>
                                        <td scope="row" class="size">2504</td>
                                        <td scope="row" colspan="3" class="size">Cabezal</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2504 as $barra2504s) {
                                                $restado = $barra2504s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2504s->piezas;
                                                $piezas_repeticiones2504 = $piezas * $repeteciones;

                                                $totalMts = $piezas_repeticiones2504 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }
                                            
                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                              echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                            ?></td> 
                                    </tr>

                                    <tr>
                                        <td scope="row" class="size">2505</td>
                                        <td scope="row" colspan="3" class="size">Zocalo</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2505 as $barra2505s) {
                                                $restado = $barra2505s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2505s->piezas;
                                                $piezas_repeticiones2505 = $piezas * $repeteciones;

                                                $totalMts = $piezas_repeticiones2505 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }
                                            
                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                            echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                        ?></td> 
                                    </tr>

                                    <tr>
                                        <td scope="row" class="size">2507</td>
                                        <td scope="row" colspan="3" class="size">Enganche</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2507 as $barra2507s) {
                                                $restado = $barra2507s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2507s->piezas;
                                                $piezas_repeticiones2507 = $piezas * $repeteciones;

                                                $totalMts = $piezas_repeticiones2507 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }
                                            
                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                              echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                            ?></td> 
                                    </tr> 

                                    <tr>
                                        <td scope="row" class="size">2509</td>
                                        <td scope="row" colspan="3" class="size">Jamba</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2509 as $barra2509s) {
                                                $restado = $barra2509s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2509s->piezas;
                                                $piezas_repeticiones2509 = $piezas * $repeteciones;

                                                $totalMts = $piezas_repeticiones2509 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }
                                            
                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                              echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                        ?></td> 
                                    </tr>   

                                    <tr>
                                        <td scope="row" class="size">2510</td>
                                        <td scope="row" colspan="3" class="size">Pierna</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2510 as $barra2510s) {
                                                $restado = $barra2510s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2510s->piezas;
                                                $piezas_repeticiones2510 = $piezas * $repeteciones;

                                                $totalMts = $piezas_repeticiones2510 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }
                                            
                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                              echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                            ?></td> 
                                        </tr> 
                                    @if(count($barra2521) > 0)  
                                    <tr>
                                        <td scope="row" class="size">2521</td>
                                        <td scope="row" colspan="3" class="size">Union</td>
                                        <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra2521 as $barra2521s) {
                                                $restado = $barra2521s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra2521s->piezas;
                                                $piezas_repeticiones2521 = $piezas * $repeteciones;

                                                $totalMts = $piezas_repeticiones2521 * $restaSuma;

                                                $totalSumado += $totalMts;
                                            }
                                            
                                            if ($totalSumado > 0.001 && $totalSumado <= 6.000){
                                                echo "1";
                                            }if($totalSumado > 6.000 && $totalSumado <= 12.000){
                                              echo "2";  
                                            }if($totalSumado > 12.000 && $totalSumado <= 18.000){
                                              echo "3";  
                                            }if($totalSumado > 18.000 && $totalSumado <= 24.000){
                                              echo "4";  
                                            }if($totalSumado > 24.000 && $totalSumado <= 30.000){
                                              echo "5";  
                                            }if($totalSumado > 30.000 && $totalSumado <= 36.000){
                                              echo "6";  
                                            }if($totalSumado > 36.000 && $totalSumado <= 42.000){
                                             echo "7";  
                                            }if($totalSumado > 42.000 && $totalSumado <= 48.000){
                                              echo "8";  
                                            }if($totalSumado > 48.000 && $totalSumado <= 54.000){
                                              echo "9";  
                                            }if($totalSumado > 54.000 && $totalSumado <= 60.000){
                                              echo "10";  
                                            }if($totalSumado > 60.000 && $totalSumado <= 66.000){
                                              echo "11";  
                                            }if($totalSumado > 66.000 && $totalSumado <= 72.000){
                                              echo "12";  
                                            }if($totalSumado > 72.000 && $totalSumado <= 78.000){
                                              echo "13";  
                                            }if($totalSumado > 78.000 && $totalSumado <= 84.000){
                                              echo "14";  
                                            }if($totalSumado > 84.000 && $totalSumado <= 90.000){
                                              echo "15";  
                                            }if($totalSumado > 90.000 && $totalSumado <= 96.000){
                                              echo "16";  
                                            }if($totalSumado > 96.000 && $totalSumado <= 102.000){
                                              echo "17";  
                                            }if($totalSumado > 102.000 && $totalSumado <= 108.000){
                                              echo "18";  
                                            }if($totalSumado > 108.000 && $totalSumado <= 114.000){
                                              echo "19";  
                                            }if($totalSumado > 114.000 && $totalSumado <= 120.000){
                                              echo "20";  
                                            }if($totalSumado > 120.000 && $totalSumado <= 126.000){
                                              echo "21";  
                                            }if($totalSumado > 126.000 && $totalSumado <= 132.000){
                                              echo "22";  
                                            }if($totalSumado > 132.000 && $totalSumado <= 138.000){
                                              echo "23";  
                                            }if($totalSumado > 138.000 && $totalSumado <= 144.000){
                                              echo "24";  
                                            }if($totalSumado > 144.000 && $totalSumado <= 150.000){
                                              echo "25";  
                                            }if($totalSumado > 150.000 && $totalSumado <= 156.000){
                                              echo "26";  
                                            }if($totalSumado > 162.000 && $totalSumado <= 168.000){
                                              echo "27";  
                                            }if($totalSumado > 168.000 && $totalSumado <= 174.000){
                                              echo "28";  
                                            }if($totalSumado > 174.000 && $totalSumado <= 180.000){
                                              echo "29";  
                                            }if($totalSumado > 180.000 && $totalSumado <= 186.000){
                                              echo "30";  
                                            }
                                        ?></td> 
                                    </tr>   
                                    @endif  
                                </tbody>
                            </table>
                            @endif
                      <!-- </div> -->
                    </div>
                </div>   
            </div>
            </div>
        </div>
    </div> 
</div>
<style type="text/css">
    .size{
        font-size: 1.2rem;
    }
</style>
        
        <script>
            function printDiv(nombreDiv) {
                
                var contenido = document.getElementById(nombreDiv).innerHTML;
                var contenidoOriginal = document.body.innerHTML;
                document.body.innerHTML = contenido;
                window.print();
                document.body.innerHTML = contenidoOriginal;
            }
            function printDiv1(nombreDiv) {
                
                var contenido = document.getElementById(nombreDiv).innerHTML;
                var contenidoOriginal = document.body.innerHTML;
                document.body.innerHTML = contenido;
                window.print();
                document.body.innerHTML = contenidoOriginal;
            }
            function printDiv2(nombreDiv) {
                
                var contenido = document.getElementById(nombreDiv).innerHTML;
                var contenidoOriginal = document.body.innerHTML;
                document.body.innerHTML = contenido;
                window.print();
                document.body.innerHTML = contenidoOriginal;
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    </body>
</html>