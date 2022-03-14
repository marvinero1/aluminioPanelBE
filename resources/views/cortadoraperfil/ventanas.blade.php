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
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Hoja 2</a>
                <a class="nav-item nav-link" id="nav-res-tab" data-toggle="tab" href="#nav-res" role="tab" aria-controls="nav-res" aria-selected="false">Hoja 3</a>
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
                                <!-- <th scope="col" class="text-center">#Ventas</th> -->
                                <th scope="col" class="text-center">Ventanas</th>
                                <th scope="col" class="text-center">Codigo</th>
                                <th scope="col" class="text-center">Nombre</th>
                                <th scope="col" class="text-center">Descuento</th>
                                <th scope="col" class="text-center">Piezas</th>
                             <!-- <th scope="col">Handle</th> -->
                            </tr>
                          </thead>

                          <tbody>
                            @foreach($perfil as $perfils)
                                <tr>
                                    <td scope="row">{{ $perfils->repeticion }}</td>
                                   <!--  <td scope="row"><?php
                                       
                                    ?></td> -->
                                    <td style="display:block;"><?php  
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
                             <!--       <td class="text-center">
                                         <?php
                                        foreach ($barra as $barras){
                                        $barra_perfil_id = $barras->perfil_id;
                                            if($id_perfil == $barra_perfil_id){
                                                $fam_linea = $barras->fam_linea;
                                                $nombre = $barras->nombre;
                                                $repetecion = $perfils->repeticion;
                                                $ancho = $barras->largo;
                                                $resta = $barras->resta;
                                                $piezas = $barras->piezas;
                                                $restaRecorte =  $ancho - $resta;

                                                 $piezas_repeticiones = $piezas * $repetecion;

                                                $piezas = $barras->piezas;
                                                $restado = $barras->restado;
                                                $round = round($restado);
                                                   
                                                $a = ($round * $piezas_repeticiones);
                                                $seis = '6000';
                                                $rsta = $a - $seis;
                                                if ($rsta > '0') {
                                                    echo "<p>Se necesitara 1 barra, mas $rsta</p>";
                                                }if($rsta >= $seis){
                                                    echo '<p>Se necesitara mas de 2 barra</p>';

                                                }if($rsta > '12000'){
                                                    echo '<p>Se necesitara mas de 3 barra</p>';

                                                }
                                                                                               
                                                echo "<p>resultado: $a</p>
                                                <p>Barra: $seis</p>
                                                <p>$rsta</p>
                                                ";   
                                            }
                                        }?> 
                                    </td>  --> 
                                </tr>
                            @endforeach                      
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- HOJA2 -->
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="float-right p-1">
                <a href="/cortadoraPerfil" class="btn btn-warning">Atras</a>
            </div>
            <div class="float-left p-3">
                <button type="button" class="btn btn-success" onclick="printDiv1('areaImprimir1')" value="imprimir div">
                <i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
            </div><br><br>

            <div class="tab-content p-4" id="areaImprimir1">
                <div class="col-md-6">
                    <div class="row">
                        <p><strong>Nombre Cliente: </strong></p>{{ $nombre_cliente }}
                    </div>
                </div>
                <div class="class">
                    @if(count($barra2001) > 0 && count($barra2002) > 0)
                    <p><strong>Resumen Linea 20</strong></p>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            @if(count($barra2001) > 0)  
                            <p><strong>Resumen 2001</strong></p>
                            <table class="table-responsive-sm" border="1">
                                  <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Ventana</th>
                                        <th scope="col" class="text-center">Piezas</th>
                                        <th scope="col" class="text-center">Descuento</th>
                                        <th scope="col" class="text-center">Barra</th>
                                    </tr>
                                  </thead>

                              <tbody>
                                @foreach($barra2001 as $barra2001s)
                                    <tr>
                                        <td scope="row">{{ $barra2001s->fam_linea }}</td>
                                        <td class="text-center"><?php

                                            $fam_linea = $barra2001s->fam_linea;
                                            $nombre = $barra2001s->nombre;
                                            $ancho = $barra2001s->ancho;
                                            $restado = $barra2001s->restado;

                                            $piezas = $barra2001s->piezas;

                                            $piezas_repeticiones2001 = $piezas * $repeteciones;   

                                            echo "$piezas_repeticiones2001";        
                                        ?></td> 
                                        <td class="text-center">{{ number_format($barra2001s->restado,3) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2001Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;
                                    $multiplicacion=0;
                                    $multiplicacionMenor=0;
                                    foreach ($barra2001 as $barra2001s) {
                                        
                                        $restado = $barra2001s->restado;
                                        $piezas = $barra2001s->piezas;
                                        $restadoSuma2001 = $restado + $suma;
                                        $piezas_repeticiones2001 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2001*$restadoSuma2001;
                                        $piezas_2001Total += $piezas_repeticiones2001;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2001 as $barra2001s){
                                        $restado = $barra2001s->restado;
                                        $piezas = $barra2001s->piezas;
                                        $restadoSuma2001 = $restado + $suma;
                                         $piezas_repeticiones2001 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2001*$restadoSuma2001;

                                        for ($i=0; $i < $piezas_repeticiones2001; $i++){
                                        
                                        // impresion mas 0.004
                                        echo "|".$restadoSuma2001."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                            
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){

                                        $restadoalTotal = $totalSumaBarra-6.000;
                                        $menos_corte = $piezas_2001Total - 1;     

                                        $saldos=array();

                                        foreach($barra2001 as $barra2001s){
                                            $restado = $barra2001s->restado;
                                            $piezas = $barra2001s->piezas;
                                            $restadoSuma2001 = $restado + $suma;
                                            $piezas_repeticiones2001 = $piezas * $repeteciones;
                                            $piezasDescuento = $piezas_repeticiones2001*$restadoSuma2001;
                                           
                                            $saldos[] = $restadoSuma2001;
                                        }
                                   
                                        //Ordenamos el array de menor a mayor
                                        sort($saldos);

                                        //Obtenemos el valor menor
                                        $menor = json_encode($saldos[0]);

                                        //Obtenemos el valor mayor
                                        $mayor = $saldos[count($saldos)-1];

                                        //Ubicamos cual es el valor más cercano desde la derecha al numero faltante
                                        if($restadoalTotal > $mayor){
                                            $cercano = $mayor;
                                        }else{
                                            foreach($saldos as $a){
                                                if( ($a - $restadoalTotal) >= 0 ){
                                                    $cercano = $a;
                                                    break;
                                                }
                                            }
                                        }

                                        $barraMenosSobrante = $totalSumaBarra - $cercano;
                                       
                                        {{-- echo "Primera Barra= ".($barraMenosSobrante);
                                        echo "<br>"."Segunda Barra= ".($cercano); --}}
                                        echo "<li>Barras: "."2"."</li>";
                                        echo "<li>Cortes Total: ".$piezas_2001Total."</li>"; 
                                       
                                        foreach($barra2001 as $barra2001s){
                                            $restado = $barra2001s->restado;
                                            $piezas = $barra2001s->piezas;
                                            $restadoSuma2001 = $restado + $suma;
                                            $piezas_repeticiones2001 = $piezas * $repeteciones;
                                            $piezasDescuento = $piezas_repeticiones2001*$restadoSuma2001;
                                            
                                            $saldos[] = $restadoSuma2001;

                                            $dataSaldos2001[] = array("corte"=>number_format($restadoSuma2001,3), "repeticion"=>$piezas_repeticiones2001);   
                                        }

                                       

                                        {{-- SEGUNDA BARRA --}}
                                        echo "<div><strong>Segunda Barra</strong></div>";
                                        
                                        foreach ($dataSaldos2001 as $key => $val){ 
                                            if (($clave = array_search("$cercano", $val)) !== false) {
                                                unset($val[$clave]);
                                                $rep = $val;
                                                foreach($val as $num){
                                                    $numero = $num;
                                                    $multiplicacion = $cercano * $numero;
                                                }
                                                {{-- echo $multiplicacion; --}}
                                            }
                                        } 

                                        $p = $totalSumaBarra - $multiplicacion;
                                         
                                         
                                        {{-- echo $totalSumaBarra."<br>";
                                        echo "<br>".$p."<br>";
                                        echo $cercano; 
                                        echo $menor; --}}

                                        if ($p < 6.000) {
                                            echo  "|".$cercano."|"."=".$multiplicacion;
                                        }else{
                                            //falta sacar el total del cercano y del menor sumar y sacar el total
                                            
                                            unset($dataSaldos2001[$cercano]); 
                                            unset($dataSaldos2001[$clave]);

                                            echo json_encode($dataSaldos2001);

                                            $t2 = $totalSumaBarra - ($cercano + $menor);
                                            echo "=".$t2;
                                        }

                                        {{-- PRIMERA BARRA --}}
                                        echo "<div><strong>Primera Barra</strong></div>";

                                        {{-- print_r($saldoSinrepeat); --}}

                                        if ($p < 6.000) {

                                            
                                            unset($dataSaldos2001[2.848]);
                                            echo json_encode($dataSaldos2001); 


                                             

                                            echo "=".($p)."<br>";
                                        }else{
                                            $t2 = $cercano + $menor;
                                            echo "|".$cercano."|".$menor."|"."=".$t2;
                                        } 
                                           

                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }

                                    ?></td>
                                </tr> 
                              </tbody>
                            </table>
                            @endif
                        </div>

                        <div class="col-md-6">
                            @if(count($barra2002) > 0)
                            <p><strong>Resumen 2002</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2002 as $barra2002s)
                                    <tr>
                                        <td scope="row">{{ $barra2002s->fam_linea }}</td>
                                     
                                        <td class="text-center"><?php

                                            $fam_linea = $barra2002s->fam_linea;
                                            $nombre = $barra2002s->nombre;
                                            $ancho = $barra2002s->ancho;
                                            $restado = $barra2002s->restado;
                                            $piezas = $barra2002s->piezas;

                                            $piezas_repeticiones2002 = $piezas * $repeteciones;   

                                            echo "$piezas_repeticiones2002";            
                                        
                                        ?></td> 
                                        <td class="text-center">{{ number_format($barra2002s->restado,3)  }}</td>
                                    </tr>
                                @endforeach  
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2002Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;
                                    $multiplicacion=0;
                                    $multiplicacionMenor=0;


                                    foreach ($barra2002 as $barra2002s){
                                        $restado = $barra2002s->restado;
                                        $piezas = $barra2002s->piezas;
                                        $restadoSuma2002 = $restado + $suma;
                                        $piezas_repeticiones2002 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2002*$restadoSuma2002;
                                        $piezas_2002Total += $piezas_repeticiones2002;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2002 as $barra2002s){
                                        $restado = $barra2002s->restado;
                                        $piezas = $barra2002s->piezas;
                                        $restadoSuma2002 = $restado + $suma;
                                         $piezas_repeticiones2002 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2002*$restadoSuma2002;

                                        for ($i=0; $i < $piezas_repeticiones2002; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2002."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                            $restadoalTotal = $totalSumaBarra-6.000;
                                            $saldos=array();

                                            foreach($barra2002 as $barra2002s){
                                                $restado = $barra2002s->restado;
                                                $piezas = $barra2002s->piezas;
                                                $restadoSuma2002 = $restado + $suma;
                                                $piezas_repeticiones2002 = $piezas * $repeteciones;
                                                $piezasDescuento = $piezas_repeticiones2002*$restadoSuma2002;
                                               
                                                $saldos[] = $restadoSuma2002;

                                                $dataSaldos2002[] = array("corte"=>number_format($restadoSuma2002,3), "repeticion"=>$piezas_repeticiones2002);   

                                            }
                                       
                                            //Ordenamos el array de menor a mayor
                                            sort($saldos);

                                            //Obtenemos el valor menor
                                            $menor = json_encode($saldos[0]);

                                            //Obtenemos el valor mayor
                                            $mayor = $saldos[count($saldos)-1];

                                            //Ubicamos cual es el valor más cercano desde la derecha al numero faltante
                                            if($restadoalTotal > $mayor){
                                                $cercano = $mayor;
                                            }else{
                                                foreach($saldos as $a){
                                                    if( ($a - $restadoalTotal) >= 0 ){
                                                        $cercano = $a;
                                                        break;
                                                    }
                                                }
                                            }

                                            $barraMenosSobrante = $totalSumaBarra - $cercano;
                                           
                                            {{-- echo "Primera Barra= ".($barraMenosSobrante);
                                            echo "<br>"."Segunda Barra= ".($cercano); --}}
                                            echo "<li>Barras: "."2"."</li>";
                                            echo "<li>Cortes Total: ".$piezas_2002Total."</li>";                            

                                            {{-- SEGUNDA BARRA --}}
                                            echo "<div><strong>Segunda Barra</strong></div>";
                                            
                                            foreach ($dataSaldos2002 as $key => $val){ 
                                                if (($clave = array_search("$cercano", $val)) !== false) {
                                                    unset($val[$clave]);
                                                    $rep = $val;
                                                    foreach($val as $num){
                                                        $numero = $num;
                                                        $multiplicacion = $cercano * $numero;
                                                    }
                                                    {{-- echo $multiplicacion; --}}
                                                }
                                            } 

                                            $p = $totalSumaBarra - $multiplicacion;

                                           {{-- echo $totalSumaBarra."<br>";
                                             echo "<br>".$p."<br>";
                                            echo $cercano; 
                                            echo $menor; --}}

                                            if ($p < 6.000){
                                                echo  "|".$cercano."|"."=".$multiplicacion;
                                            }else{
                                                //falta sacar el total del cercano y del menor sumar y sacar el total
                                                
                                                unset($dataSaldos2002[$cercano]); 
                                                unset($dataSaldos2002[$clave]);

                                                echo json_encode($dataSaldos2002);

                                                $t2 = $totalSumaBarra - ($cercano + $menor);
                                                echo "=".$t2;
                                            }

                                            {{-- PRIMERA BARRA --}}
                                            {{-- echo "<div><strong>Primera Barra</strong></div>";
                                            if ($p < 6.000) {
                                                //falta sacar el total del cercano y del menor sumar y sacar el total
                                                
                                                unset($dataSaldos2002[$cercano]); 
                                                unset($dataSaldos2002[$clave]);

                                                echo json_encode($dataSaldos2002);

                                                $t2 = $totalSumaBarra - ($cercano + $menor);
                                                echo "=".$t2;
                                            }else{
                                                echo  "|".$cercano."|"."=".$multiplicacion;
                                            }  --}}

                                            echo "<div><strong>Primera Barra</strong></div>";

                                        {{-- print_r($saldoSinrepeat); --}}

                                        if ($p < 6.000) {
                                            unset($dataSaldos2002[$clave]);
                                            echo json_encode($dataSaldos2002);

                                            echo "=".($p)."<br>";
                                        }else{
                                            $t2 = $cercano + $menor;
                                            echo "|".$cercano."|".$menor."|"."=".$t2;
                                        }  

                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }

                                    ?></td>
                                </tr>                
                              </tbody>
                            </table>
                            @endif
                        </div>
                    </div><br>
                    <div class="row">
                         <div class="col-6">
                            @if(count($barra2005) > 0)
                            <p><strong>Resumen 2005</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2005 as $barra2005s)
                                    <tr>
                                        <td scope="row">{{ $barra2005s->fam_linea }}</td>
                                        <td class="text-center"><?php
                                           
                                            $fam_linea = $barra2005s->fam_linea;
                                            $nombre = $barra2005s->nombre;
                                            $ancho = $barra2005s->largo;
                                            $resta = $barra2005s->resta;
                                            $piezas = $barra2005s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra2005s->piezas;
                                            $piezas_repeticiones2005 = $piezas * $repeteciones;

                                               echo $piezas_repeticiones2005;
                                        ?></td>
                                        <td class="text-center">{{ number_format($barra2005s->restado,3) }}
                                            @if($barra2005s->restado >= 6.000)
                                                <p>Descuento supera 1 barra de 6.000</p>
                                            @endif
                                        </td> 
                                       
                                    </tr>
                                @endforeach   
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2005Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;
                                    $multiplicacion=0;
                                    $multiplicacionMenor=0;

                                    foreach ($barra2005 as $barra2005s){
                                        $restado = $barra2005s->restado;
                                        $piezas = $barra2005s->piezas;
                                        $restadoSuma2005 = $restado + $suma;
                                        $piezas_repeticiones2005 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2005*$restadoSuma2005;
                                        $piezas_2005Total += $piezas_repeticiones2005;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                        foreach($barra2005 as $barra2005s){
                                            $restado = $barra2005s->restado;
                                            $piezas = $barra2005s->piezas;
                                            $restadoSuma2005 = $restado + $suma;
                                             $piezas_repeticiones2005 = $piezas * $repeteciones;
                                            $piezasDescuento = $piezas_repeticiones2005*$restadoSuma2005;

                                            for ($i=0; $i < $piezas_repeticiones2005; $i++){
                                                // impresion mas 0.004
                                                echo "|".$restadoSuma2005."|";
                                           }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                        $restadoalTotal = $totalSumaBarra-6.000;
                                            $saldos=array();

                                            foreach($barra2005 as $barra2005s){
                                                $restado = $barra2005s->restado;
                                                $piezas = $barra2005s->piezas;
                                                $restadoSuma2005 = $restado + $suma;
                                                $piezas_repeticiones2005 = $piezas * $repeteciones;
                                                $piezasDescuento = $piezas_repeticiones2005*$restadoSuma2005;
                                               
                                                $saldos[] = $restadoSuma2005;

                                                $dataSaldos2005[] = array("corte"=>number_format($restadoSuma2005,3), "repeticion"=>$piezas_repeticiones2005);   

                                            }
                                       
                                            //Ordenamos el array de menor a mayor
                                            sort($saldos);

                                            //Obtenemos el valor menor
                                            $menor = json_encode($saldos[0]);

                                            //Obtenemos el valor mayor
                                            $mayor = $saldos[count($saldos)-1];

                                            //Ubicamos cual es el valor más cercano desde la derecha al numero faltante
                                            if($restadoalTotal > $mayor){
                                                $cercano = $mayor;
                                            }else{
                                                foreach($saldos as $a){
                                                    if( ($a - $restadoalTotal) >= 0 ){
                                                        $cercano = $a;
                                                        break;
                                                    }
                                                }
                                            }

                                            $barraMenosSobrante = $totalSumaBarra - $cercano;
                                           
                                            {{-- echo "Primera Barra= ".($barraMenosSobrante);
                                            echo "<br>"."Segunda Barra= ".($cercano); --}}
                                            echo "<li>Barras: "."2"."</li>";
                                            echo "<li>Cortes Total: ".$piezas_2005Total."</li>";                            

                                            {{-- SEGUNDA BARRA --}}
                                                echo "<div><strong>Segunda Barra</strong></div>";
                                                
                                                foreach ($dataSaldos2005 as $key => $val){ 
                                                    if (($clave = array_search("$cercano", $val)) !== false) {
                                                        unset($val[$clave]);
                                                        $rep = $val;
                                                        foreach($val as $num){
                                                            $numero = $num;
                                                            $multiplicacion = $cercano * $numero;
                                                        }
                                                        {{-- echo $multiplicacion; --}}
                                                    }
                                                } 

                                                $p = $totalSumaBarra - $multiplicacion;

                                                if ($p < 6.000) {
                                                    echo  "|".$cercano."|"."=".$multiplicacion;                        
                                                }else{
                                                    //falta sacar el total del cercano y del menor sumar y sacar el total
                                                    echo "|".$cercano."|".$menor."|";
                                                }



                                                {{-- PRIMERA BARRA --}}
                                                echo "<div><strong>Primera Barra</strong></div>";

                                                {{-- print_r($saldoSinrepeat); --}}

                                                if ($p < 6.000) {
                                                    unset($dataSaldos2005[$clave]);
                                                    echo json_encode($dataSaldos2005);

                                                    echo "=".($p);
                                                }else{
                                                   {{-- echo "<br><br>"; --}}
                                                    unset($dataSaldos2005[$clave]);

                                                    foreach ($dataSaldos2005 as $key => $val){ 
                                                        if (($clave = array_search("$menor", $val)) !== false) {
                                                            unset($val[$clave]);
                                                            $rep = $val;
                                                            foreach($val as $num){
                                                                $numero = $num;
                                                                $multiplicacionMenor = $menor * $numero;
                                                            }
                                                            unset($val[$menor]);

                                                            {{-- echo $multiplicacionMenor; --}}
                                                        }
                                                    }

                                                    echo json_encode($val); 
                                                    {{-- echo "=".($multiplicacionMenor)."<br>";  --}}
                                                } 

                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }if($totalSumaBarra > 48.000 && $totalSumaBarra <= 54.000){
                                          echo "9";  
                                        }if($totalSumaBarra > 54.000 && $totalSumaBarra <= 60.000){
                                          echo "10";  
                                        }if($totalSumaBarra > 60.000 && $totalSumaBarra <= 66.000){
                                          echo "11";  
                                        }if($totalSumaBarra > 66.000 && $totalSumaBarra <= 72.000){
                                          echo "12";  
                                        }if($totalSumaBarra > 72.000 && $totalSumaBarra <= 78.000){
                                          echo "13";  
                                        }if($totalSumaBarra > 78.000 && $totalSumaBarra <= 84.000){
                                          echo "14";  
                                        }

                                    ?></td>
                                </tr>                   
                              </tbody>
                            </table>
                            @endif
                        </div>
                    <div class="col-6">
                        @if(count($barra2009) > 0)
                            <p><strong>Resumen 2009</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2009 as $barra2009s)
                                    <tr>
                                        <td scope="row">{{ $barra2009s->fam_linea }}</td>
                                       
                                        <td class="text-center"><?php
                                           
                                              $fam_linea = $barra2009s->fam_linea;
                                              $nombre = $barra2009s->nombre;
                                              $ancho = $barra2009s->largo;
                                              $resta = $barra2009s->resta;
                                              $piezas = $barra2009s->piezas;
                                              $restaRecorte =  $ancho - $resta;

                                              $piezas = $barra2009s->piezas;
                                              $piezas_repeticiones2009 = $piezas * $repeteciones;

                                               echo $piezas_repeticiones2009;
                                        ?></td>
                                        <td class="text-center">{{ number_format($barra2009s->restado,3) }}</td> 
                                    </tr>
                                @endforeach  
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2009Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra2009 as $barra2009s){
                                        $restado = $barra2009s->restado;
                                        $piezas = $barra2009s->piezas;
                                        $restadoSuma2009 = $restado + $suma;
                                        $piezas_repeticiones2009 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2009*$restadoSuma2009;
                                        $piezas_2009Total += $piezas_repeticiones2009;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2009 as $barra2005s){
                                        $restado = $barra2005s->restado;
                                        $piezas = $barra2005s->piezas;
                                        $restadoSuma2005 = $restado + $suma;
                                         $piezas_repeticiones2005 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2005*$restadoSuma2005;

                                        for ($i=0; $i < $piezas_repeticiones2005; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2005."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }

                                    ?></td>
                                </tr>                      
                              </tbody>
                            </table>
                            @endif
                        </div>
                    </div><br>

                     <div class="row">
                         <div class="col-6">
                            @if(count($barra2010) > 0)

                            <p><strong>Resumen 2010</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2010 as $barra2010s)
                                    <tr>
                                        <td scope="row">{{ $barra2010s->fam_linea }}</td>
                                        <td class="text-center"><?php 
                                            $fam_linea = $barra2010s->fam_linea;
                                            $nombre = $barra2010s->nombre;
                                            $ancho = $barra2010s->largo;
                                            $resta = $barra2010s->resta;
                                            $piezas = $barra2010s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra2010s->piezas;
                                            $piezas_repeticiones2010 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones2010;
                                        ?></td> 
                                        <td class="text-center">{{ number_format($barra2010s->restado,3) }}</td>
                                    </tr>
                                @endforeach    
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2010Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra2010 as $barra2010s){
                                        $restado = $barra2010s->restado;
                                        $piezas = $barra2010s->piezas;
                                        $restadoSuma2010 = $restado + $suma;
                                        $piezas_repeticiones2010 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2010*$restadoSuma2010;
                                        $piezas_2010Total += $piezas_repeticiones2010;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2010 as $barra2010s){
                                        $restado = $barra2010s->restado;
                                        $piezas = $barra2010s->piezas;
                                        $restadoSuma2010 = $restado + $suma;
                                         $piezas_repeticiones2010 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2010*$restadoSuma2010;

                                        for ($i=0; $i < $piezas_repeticiones2010; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2010."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }

                                    ?></td>
                                </tr>                
                              </tbody>
                            </table>
                            @endif
                        </div>
                        <div class="col-6">
                            @if(count($barra2011) > 0)

                            <p><strong>Resumen 2011</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2011 as $barra2011s)
                                    <tr>
                                        <td scope="row">{{ $barra2011s->fam_linea }}</td>
                                        <td class="text-center"><?php
                                           
                                            $fam_linea = $barra2011s->fam_linea;
                                            $nombre = $barra2011s->nombre;
                                            $ancho = $barra2011s->largo;
                                            $resta = $barra2011s->resta;
                                            $piezas = $barra2011s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra2011s->piezas;
                                            $piezas_repeticiones2011 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones2011;
                                        ?></td> 
                                          <td class="text-center">{{ number_format($barra2011s->restado,3) }}</td> 
                                    </tr>
                                @endforeach 
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2011Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra2011 as $barra2011s){
                                        $restado = $barra2011s->restado;
                                        $piezas = $barra2011s->piezas;
                                        $restadoSuma2011 = $restado + $suma;
                                        $piezas_repeticiones2011 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2011*$restadoSuma2011;
                                        $piezas_2011Total += $piezas_repeticiones2010;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2011 as $barra2011s){
                                        $restado = $barra2011s->restado;
                                        $piezas = $barra2011s->piezas;
                                        $restadoSuma2011 = $restado + $suma;
                                         $piezas_repeticiones2011 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2010*$restadoSuma2011;

                                        for ($i=0; $i < $piezas_repeticiones2011; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2011."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }

                                    ?></td>
                                </tr>                
                              </tbody>
                            </table>
                            @endif

                        </div>
                    </div><br><br>

                    <div class="row">
                         <div class="col-6">
                            @if(count($barra5008) > 0)

                            <p><strong>Resumen 5008</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra5008 as $barra5008s)
                                    <tr>
                                        <td scope="row">{{ $barra5008s->fam_linea }}</td>
                                        <td class="text-center"><?php
                                            $fam_linea = $barra5008s->fam_linea;
                                            $nombre = $barra5008s->nombre;
                                            $ancho = $barra5008s->largo;
                                            $resta = $barra5008s->resta;
                                            $piezas = $barra5008s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra5008s->piezas;
                                            $piezas_repeticiones5008 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones5008;
                                        ?></td> 
                                        <td class="text-center">{{ number_format($barra2010s->restado,3) }}</td> 
                                    </tr>
                                @endforeach  
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_5008Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra5008 as $barra5008s){
                                        $restado = $barra5008s->restado;
                                        $piezas = $barra5008s->piezas;
                                        $restadoSuma5008 = $restado + $suma;
                                        $piezas_repeticiones5008 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones5008*$restadoSuma5008;
                                        $piezas_5008Total += $piezas_repeticiones5008;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra5008 as $barra5008s){
                                        $restado = $barra5008s->restado;
                                        $piezas = $barra5008s->piezas;
                                        $restadoSuma5008 = $restado + $suma;
                                         $piezas_repeticiones5008 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones5008*$restadoSuma5008;

                                        for ($i=0; $i < $piezas_repeticiones5008; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma5008."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }
                                    ?></td>
                                </tr>                   
                              </tbody>
                            </table>
                            @endif

                        </div>
                    </div><br>

                    @if(count($barra2501) > 0 && count($barra2502) > 0)
                    <!-- <p><strong>Resumen Linea 25</strong></p> -->
                    @endif
                    
                    <div class="row">
                         <div class="col-6">
                            @if(count($barra2501) > 0) 
                            <p><strong>Resumen 2501</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2501 as $barra2501s)
                                    <tr>
                                         <td scope="text-center">{{ $barra2501s->fam_linea }}</td>
                                        
                                        <td class="text-center"><?php
                                           
                                            $fam_linea = $barra2501s->fam_linea;
                                            $nombre = $barra2501s->nombre;
                                            $ancho = $barra2501s->largo;
                                            $resta = $barra2501s->resta;
                                            $piezas = $barra2501s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra2501s->piezas;
                                            $piezas_repeticiones2501 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones2501;
                                        ?></td> 
                                        <td class="text-center">{{ number_format($barra2501s->restado,3) }}</td> 
                                    </tr>
                                @endforeach   
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2501Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra2501 as $barra2501s){
                                        $restado = $barra2501s->restado;
                                        $piezas = $barra2501s->piezas;
                                        $restadoSuma2501 = $restado + $suma;
                                        $piezas_repeticiones2501 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2501*$restadoSuma2501;
                                        $piezas_2501Total += $piezas_repeticiones2501;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2501 as $barra2501s){
                                        $restado = $barra2501s->restado;
                                        $piezas = $barra2501s->piezas;
                                        $restadoSuma2501 = $restado + $suma;
                                         $piezas_repeticiones2501 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2501*$restadoSuma2501;

                                        for ($i=0; $i < $piezas_repeticiones2501; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2501."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }

                                    ?></td>
                                </tr>             
                              </tbody>
                            </table>
                            @endif
                        </div>
                        <div class="col-6">
                            @if(count($barra2502) > 0)

                            <p><strong>Resumen 2502</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2502 as $barra2502s)
                                    <tr>
                                        <td scope="row">{{ $barra2502s->fam_linea }}</td>
                                        <td class="text-center"><?php
                                           
                                            $fam_linea = $barra2502s->fam_linea;
                                            $nombre = $barra2502s->nombre;
                                            $ancho = $barra2502s->largo;
                                            $resta = $barra2502s->resta;
                                            $piezas = $barra2502s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra2502s->piezas;
                                            $piezas_repeticiones2502 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones2502;
                                        ?></td> 
                                         <td class="text-center">{{ number_format($barra2502s->restado,3) }}</td> 
                                    </tr>
                                @endforeach  
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2502Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra2502 as $barra2502s){
                                        $restado = $barra2502s->restado;
                                        $piezas = $barra2502s->piezas;
                                        $restadoSuma2502 = $restado + $suma;
                                        $piezas_repeticiones2502 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2502*$restadoSuma2502;
                                        $piezas_2502Total += $piezas_repeticiones2502;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2502 as $barra2502s){
                                        $restado = $barra2502s->restado;
                                        $piezas = $barra2502s->piezas;
                                        $restadoSuma2502 = $restado + $suma;
                                         $piezas_repeticiones2502 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2502*$restadoSuma2502;

                                        for ($i=0; $i < $piezas_repeticiones2502; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2502."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }

                                    ?></td>
                                </tr>                   
                              </tbody>
                            </table>
                            @endif
                        </div>
                    </div><br>

                    <div class="row">
                         <div class="col-6">
                            @if(count($barra2505) > 0)

                            <p><strong>Resumen 2505</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2505 as $barra2505s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2505s->fam_linea }}</td>
                                        <td class="text-center"><?php
                                           
                                              $fam_linea = $barra2505s->fam_linea;
                                              $nombre = $barra2505s->nombre;
                                              $ancho = $barra2505s->largo;
                                              $resta = $barra2505s->resta;
                                              $piezas = $barra2505s->piezas;
                                              $restaRecorte =  $ancho - $resta;

                                              $piezas = $barra2505s->piezas;
                                              $piezas_repeticiones2505 = $piezas * $repeteciones;

                                               echo $piezas_repeticiones2505;
                                        ?></td> 
                                        <td class="text-center">{{ number_format($barra2505s->restado,3) }}</td> 
                                    </tr>
                                @endforeach 
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2505Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra2505 as $barra2505s){
                                        $restado = $barra2505s->restado;
                                        $piezas = $barra2505s->piezas;
                                        $restadoSuma2505 = $restado + $suma;
                                        $piezas_repeticiones2505 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2505*$restadoSuma2505;
                                        $piezas_2505Total += $piezas_repeticiones2505;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2505 as $barra2505s){
                                        $restado = $barra2505s->restado;
                                        $piezas = $barra2505s->piezas;
                                        $restadoSuma2505 = $restado + $suma;
                                         $piezas_repeticiones2505 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2505*$restadoSuma2505;

                                        for ($i=0; $i < $piezas_repeticiones2505; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2505."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }

                                    ?></td>
                                </tr>              
                              </tbody>
                            </table>
                            @endif
                        </div>

                        <div class="col-6">
                            @if(count($barra2507) > 0)

                            <p><strong>Resumen 2507</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2507 as $barra2507s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2507s->fam_linea }}</td>
                                        <td class="text-center"><?php
                                           
                                            $fam_linea = $barra2507s->fam_linea;
                                            $nombre = $barra2507s->nombre;
                                            $ancho = $barra2507s->largo;
                                            $resta = $barra2507s->resta;
                                            $piezas = $barra2507s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra2507s->piezas;
                                            $piezas_repeticiones2507 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones2507;
                                        ?></td> 
                                         <td class="text-center">{{ number_format($barra2507s->restado,3) }}</td>
                                    </tr>
                                @endforeach  
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2507Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra2507 as $barra2507s){
                                        $restado = $barra2507s->restado;
                                        $piezas = $barra2507s->piezas;
                                        $restadoSuma2507 = $restado + $suma;
                                        $piezas_repeticiones2507 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2507*$restadoSuma2507;
                                        $piezas_2507Total += $piezas_repeticiones2507;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }

                                    //la sumatoria total de todos los cortes mas 0.004
                                    // echo "=".$totalSumaBarra.",---";
                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2507 as $barra2507s){
                                        $restado = $barra2507s->restado;
                                        $piezas = $barra2507s->piezas;
                                        $restadoSuma2507 = $restado + $suma;
                                         $piezas_repeticiones2507 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2507*$restadoSuma2507;

                                        for ($i=0; $i < $piezas_repeticiones2507; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2507."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }

                                    ?></td>
                                </tr>      
                              </tbody>
                            </table>
                             @endif
                        </div>
                    </div><br>


                    <div class="row">
                        <div class="col-6">
                            @if(count($barra2509) > 0)

                            <p><strong>Resumen 2509</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2509 as $barra2509s)
                                    <tr>
                                        <td scope="row">{{ $barra2509s->fam_linea }}</td>
                                        <td class="text-center"><?php
                                           
                                            $fam_linea = $barra2509s->fam_linea;
                                            $nombre = $barra2509s->nombre;
                                            $ancho = $barra2509s->largo;
                                            $resta = $barra2509s->resta;
                                            $piezas = $barra2509s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra2509s->piezas;
                                            $piezas_repeticiones2509 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones2509;
                                        ?></td> 
                                          <td class="text-center">{{ number_format($barra2509s->restado,3) }}</td> 
                                    </tr>
                                @endforeach  
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2509Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra2509 as $barra2509s){
                                        $restado = $barra2509s->restado;
                                        $piezas = $barra2509s->piezas;
                                        $restadoSuma2509 = $restado + $suma;
                                        $piezas_repeticiones2509 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2509*$restadoSuma2509;
                                        $piezas_2509Total += $piezas_repeticiones2509;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2509 as $barra2509s){
                                        $restado = $barra2509s->restado;
                                        $piezas = $barra2509s->piezas;
                                        $restadoSuma2509 = $restado + $suma;
                                         $piezas_repeticiones2509 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2509*$restadoSuma2509;

                                        for ($i=0; $i < $piezas_repeticiones2509; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2509."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }

                                    ?></td>
                                </tr>               
                              </tbody>
                            </table>
                              @endif
                        </div>
                        <div class="col-6">
                            @if(count($barra2510) > 0)
                            <p><strong>Resumen 2510</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2510 as $barra2510s)
                                    <tr>
                                        <td scope="row">{{ $barra2510s->fam_linea }}</td>
                                        <td class="text-center"><?php

                                            $fam_linea = $barra2510s->fam_linea;
                                            $nombre = $barra2510s->nombre;
                                            $ancho = $barra2510s->largo;
                                            $resta = $barra2510s->resta;
                                            $piezas = $barra2510s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra2510s->piezas;
                                            $piezas_repeticiones2510 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones2510;
                                        ?></td> 
                                         <td class="text-center">{{ number_format($barra2510s->restado,3) }}</td> 
                                    </tr>
                                @endforeach  
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2510Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra2510 as $barra2510s){
                                        $restado = $barra2510s->restado;
                                        $piezas = $barra2510s->piezas;
                                        $restadoSuma2510 = $restado + $suma;
                                        $piezas_repeticiones2509 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2510*$restadoSuma2510;
                                        $piezas_2510Total += $piezas_repeticiones2510;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2510 as $barra2510s){
                                        $restado = $barra2510s->restado;
                                        $piezas = $barra2510s->piezas;
                                        $restadoSuma2510 = $restado + $suma;
                                         $piezas_repeticiones2510 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2510*$restadoSuma2510;

                                        for ($i=0; $i < $piezas_repeticiones2510; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2510."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }

                                    ?></td>
                                </tr>                     
                              </tbody>
                            </table>
                            @endif
                        </div>
                    </div><br>

                    <div class="row">
                         <div class="col-6">
                            @if(count($barra2504) > 0)
                            <p><strong>Resumen 2504</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col">Descuento</th>
                                    <th scope="col" class="text-center">X</th>
                                    <th scope="col" class="text-center">Barra</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2504 as $barra2504s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2504s->fam_linea }}</td>
                                    
                                        <td class="text-center"><?php
                                            $suma = 0.004;
                                            $restado = $barra2504s->restado;
                                            $fam_linea = $barra2504s->fam_linea;
                                            $nombre = $barra2504s->nombre;
                                            $ancho = $barra2504s->largo;
                                            $resta = $barra2504s->resta;
                                            $piezas = $barra2504s->piezas;
                                            $restaRecorte =  $ancho - $resta;
                                            $restadoSuma2504 = $restado + $suma;


                                            $piezas = $barra2504s->piezas;
                                            $piezas_repeticiones2504 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones2504;
                                        ?></td> 
                                        <td class="text-center">{{ number_format($restadoSuma2504 ,3)}}</td>
                                        
                                        <td class="text-center">{{ ($restadoSuma2504) * $piezas_repeticiones2504}}</td> 
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php
                                        $barra = 6000;
                                        $totalSumaBarra = 0;
                                        $piezas_2504Total=0;
                                        $suma = 0.004;
                                        $cercano = 0;
                                        $menor =0;
                                        $mayor=0;
                                        $p=0;
                                        $p1=0;
                                        foreach ($barra2504 as $barra2504s) {
                                            
                                            $restado = $barra2504s->restado;
                                            $piezas = $barra2504s->piezas;
                                            $restadoSuma2504 = $restado + $suma;
                                            $piezas_repeticiones2504 = $piezas * $repeteciones;

                                            //el valor de la X
                                            $piezasDescuento = $piezas_repeticiones2504*$restadoSuma2504;
                                            $piezas_2504Total += $piezas_repeticiones2504;
                                            $piezasDescuentoSuma = $piezasDescuento ;
                                            $totalSumaBarra += $piezasDescuentoSuma;   
                                        }

                                        //la sumatoria total de todos los cortes mas 0.004
                                                                              
                                        if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                foreach($barra2504 as $barra2504s){
                                                    $restado = $barra2504s->restado;
                                                    $piezas = $barra2504s->piezas;
                                                    $restadoSuma2504 = $restado + $suma;
                                                     $piezas_repeticiones2504 = $piezas * $repeteciones;
                                                    $piezasDescuento = $piezas_repeticiones2504*$restadoSuma2504;

                                                    for ($i=0; $i < $piezas_repeticiones2504; $i++){
                                                    
                                                    // impresion mas 0.004
                                                    echo "|".$restadoSuma2504."|";
                                                   }
                                                }
                                                echo "=".$totalSumaBarra;


                                            }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                                $restadoalTotal = $totalSumaBarra-6.000;
                                                $menos_corte = $piezas_2504Total - 1;     

                                                $saldos=array();

                                                foreach($barra2504 as $barra2504s){
                                                    $restado = $barra2504s->restado;
                                                    $piezas = $barra2504s->piezas;
                                                    
                                                    $piezas_repeticiones2504 = $piezas * $repeteciones;
                                                    $piezasDescuento = $piezas_repeticiones2504*$restadoSuma2504;

                                                    $restadoSuma2504 = $restado + $suma;
                                                   
                                                    $saldos[] = $restadoSuma2504;
                                                }
                                                                                         
                                                //el numero de cortes en total
                                                // echo($piezas_2504Total);
                                                // echo json_encode($saldos);
                                                // echo "<br>".$restadoalTotal.", se quita 1 corte y quedan";
                                                // echo($menos_corte);

                                                //Ordenamos el array de menor a mayor
                                                sort($saldos);

                                                //Obtenemos el valor menor
                                                $menor = json_encode($saldos[0]);

                                                //Obtenemos el valor mayor
                                                
                                                $mayor = $saldos[count($saldos)-1];

                                                //Ubicamos cual es el valor más cercano desde la derecha al numero faltante
                                                if($restadoalTotal > $mayor){
                                                    $cercano = $mayor;
                                                }else{
                                                    foreach($saldos as $a){
                                                        if( ($a - $restadoalTotal) >= 0 ){
                                                            $cercano = $a;
                                                            break;
                                                        }
                                                    }
                                                }

                                                $barraMenosSobrante = $totalSumaBarra - $cercano;
                                               
                                                {{-- echo "Primera Barra= ".($barraMenosSobrante); --}}

                                                {{-- echo "<br>"."Segunda Barra= ".($cercano * ($piezas_repeticiones2504)) ; --}}

                                                {{-- echo "<br>"."Segunda Barra= ".($cercano ) ; --}}
                                                {{-- echo "<li>Restante: ".$restadoalTotal."</li>"; --}}
                                                echo "<li>Barras: "."2"."</li>";
                                                echo "<li>Corte Sacado : ".$cercano."</li>";
                                                echo "<li>Cortes Barra #1: ".$menos_corte."</li>";
                                                echo "<li>Cortes Barra #2: "."1"."</li>";
                                                echo "<li>Cortes Total: ".$piezas_2504Total."</li>";
                                                {{-- echo "<li>Cercano: ".$cercano."</li>"; --}}
                                               
                                                foreach($barra2504 as $barra2504s){
                                                    $restado = $barra2504s->restado;
                                                    $piezas = $barra2504s->piezas;
                                                    $restadoSuma2504 = $restado + $suma;
                                                     $piezas_repeticiones2504 = $piezas * $repeteciones;
                                                    $piezasDescuento = $piezas_repeticiones2504*$restadoSuma2504;
                                                    
                                                    $saldos[] = $restadoSuma2504;
                                                    $repeat = ($restadoSuma2504) * $piezas_repeticiones2504;
                                                    
                                                    $dataSaldos[] = array("corte"=>$restadoSuma2504, "repeticion"=>$piezas_repeticiones2504);   
                                                }

                                                {{-- echo json_encode($dataSaldos);  --}}                                                
                                                
                                                {{-- SEGUNDA BARRA --}}
                                                echo "<div><strong>Segunda Barra</strong></div>";
                                                
                                                foreach ($dataSaldos as $key => $val){ 
                                                    if (($clave = array_search("$cercano", $val)) !== false) {
                                                        unset($val[$clave]);
                                                        $rep = $val;
                                                        foreach($val as $num){
                                                            $numero = $num;
                                                            $multiplicacion = $cercano * $numero;
                                                        }
                                                        {{-- echo $multiplicacion; --}}
                                                    }
                                                } 

                                                $p = $totalSumaBarra - $multiplicacion;

                                                if ($p < 6.000) {
                                                    echo  "|".$cercano."|"."=".$multiplicacion;                        
                                                }else{
                                                    //falta sacar el total del cercano y del menor sumar y sacar el total
                                                    echo "|".$cercano."|".$menor."|";
                                                }



                                                {{-- PRIMERA BARRA --}}
                                                echo "<div><strong>Primera Barra</strong></div>";

                                                {{-- print_r($saldoSinrepeat); --}}

                                                if ($p < 6.000) {
                                                    unset($dataSaldos[$clave]);
                                                    echo json_encode($dataSaldos);

                                                    echo "=".($p);
                                                }else{
                                                   {{-- echo "<br><br>"; --}}
                                                    unset($dataSaldos[$clave]);

                                                    foreach ($dataSaldos as $key => $val){ 
                                                        if (($clave = array_search("$menor", $val)) !== false) {
                                                            unset($val[$clave]);
                                                            $rep = $val;
                                                            foreach($val as $num){
                                                                $numero = $num;
                                                                $multiplicacionMenor = $menor * $numero;
                                                            }
                                                            unset($val[$menor]);

                                                            {{-- echo $multiplicacionMenor; --}}
                                                        }
                                                    }

                                                    echo json_encode($val); 
                                                    {{-- echo "=".($multiplicacionMenor)."<br>";  --}}
                                                }
                                                

                                                

                                            //CUANDO SACAMOS UN CORTE PERO AUN SIGUE SIENDO MAYOR A 6000
                                            //POR LO TANTO HAY Q SACAR OTRO CORTE(YA SEA EL PROXIMO MAYOR O EL PROXIMO MENOR)

                                             

                                            }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                              echo "3";  
                                            }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                              echo "4";  
                                            }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                              echo "5";  
                                            }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                              echo "6";  
                                            }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                              echo "7";  
                                            }

                                        ?></td>
                                    </tr> 
                                <tr>
                                    
                                    
                                </tr>
                                <!-- <td colspan="2" class="text-center">TOTAL</td> -->
                               <!--  <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
                                    $totalSumado = 0;
                                    $suma = 0.004;
                                    $barra = 6.000;
                                    $totalPiezas = 0;
                                  
                                    foreach ($barra2504 as $barra2504s) {
                                        $restado = $barra2504s->restado;
                                        $restaSuma = $restado + $suma;
                                        $piezas = $barra2504s->piezas;
                                        $piezas_repeticiones2504 = $piezas * $repeteciones;

                                        $totalMts = $piezas_repeticiones2504 * $restaSuma;

                                        $totalSumado += $totalMts;

                                        $totalPiezas += $piezas;
                                        // echo json_encode($totalPiezas);

                                        if($totalSumado > 6.000){
                                            echo "2 Barras"."--".$totalPiezas."--";
                                            $totalPiezas - 1;

                                            $restante = $totalSumado - $barra;

                                            echo "<hr>$restante</hr>";
                                            //recorrer todas las piezas y sacar la mas p[roxima al restante o en su defecto la piezas mas peque;a
                                        }

                                    }
                                    echo "--"."$totalSumado";
                                ?></td>  -->                       
                              </tbody>
                            </table>
                            @endif
                        </div>
                        <div class="col-6">
                            @if(count($barra2521) > 0)

                            <p><strong>Resumen 2521</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Barra</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2521 as $barra2521s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2521s->fam_linea }}</td>
                                        <td class="text-center"><?php
                                            $fam_linea = $barra2521s->fam_linea;
                                            $nombre = $barra2521s->nombre;
                                            $ancho = $barra2521s->largo;
                                            $resta = $barra2521s->resta;
                                            $piezas = $barra2521s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra2521s->piezas;
                                            $piezas_repeticiones2521 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones2521;
                                        ?></td>
                                        <td class="text-center">{{ number_format($barra2521s->restado,3) }}</td>
                                    </tr>
                                @endforeach  
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2521Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;

                                    foreach ($barra2521 as $barra2521s){
                                        $restado = $barra2521s->restado;
                                        $piezas = $barra2521s->piezas;
                                        $restadoSuma2521 = $restado + $suma;
                                        $piezas_repeticiones2521 = $piezas * $repeteciones;

                                        //el valor de la X
                                        $piezasDescuento = $piezas_repeticiones2521*$restadoSuma2521;
                                        $piezas_2521Total += $piezas_repeticiones2521;
                                        $piezasDescuentoSuma = $piezasDescuento ;
                                        $totalSumaBarra += $piezasDescuentoSuma;
                                    }                                   
                                    if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                    
                                    foreach($barra2521 as $barra2521s){
                                        $restado = $barra2521s->restado;
                                        $piezas = $barra2521s->piezas;
                                        $restadoSuma2521 = $restado + $suma;
                                         $piezas_repeticiones2521 = $piezas * $repeteciones;
                                        $piezasDescuento = $piezas_repeticiones2521*$restadoSuma2521;

                                        for ($i=0; $i < $piezas_repeticiones2521; $i++){
                                            // impresion mas 0.004
                                            echo "|".$restadoSuma2521."|";
                                       }
                                    }
                                    echo "=".$totalSumaBarra;
                                    }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                          echo "2"; 
                                        }if($totalSumaBarra > 12.000 && $totalSumaBarra <= 18.000){
                                          echo "3";  
                                        }if($totalSumaBarra > 18.000 && $totalSumaBarra <= 24.000){
                                          echo "4";  
                                        }if($totalSumaBarra > 24.000 && $totalSumaBarra <= 30.000){
                                          echo "5";  
                                        }if($totalSumaBarra > 30.000 && $totalSumaBarra <= 36.000){
                                          echo "6";  
                                        }if($totalSumaBarra > 36.000 && $totalSumaBarra <= 42.000){
                                          echo "7";  
                                        }if($totalSumaBarra > 42.000 && $totalSumaBarra <= 48.000){
                                          echo "8";  
                                        }

                                    ?></td>
                                </tr>            
                              </tbody>
                            </table>
                            @endif
                        </div>
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
                <div class="class">
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
                                        }
                                        
                                    ?></td>  
                                    </tr>

                                    <tr>
                                        <td scope="row" class="size">5008</td>
                                        <td scope="row" colspan="3" class="size">Union</td>
                                         <td scope="row" colspan="2" class="size text-center"><?php
                                            $totalSumado = 0;
                                            $suma = 0.004;
                                          
                                            foreach ($barra5008 as $barra5008s) {
                                                $restado = $barra5008s->restado;
                                                $restaSuma = $restado + $suma;
                                                $piezas = $barra5008s->piezas;
                                                $piezas_repeticiones5008 = $piezas * $repeteciones;

                                                $totalMts = $piezas_repeticiones5008 * $restaSuma;

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
                                            }
                                        ?></td> 
                                    </tr>
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
                                    <tr  class="bg-info">
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
                                            }
                                        ?></td> 
                                    </tr>    
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
                                            }
                                        ?></td> 
                                    </tr>     
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