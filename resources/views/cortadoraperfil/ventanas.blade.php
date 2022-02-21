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
                                        <!-- <th scope="col" class="text-center">Alto</th>
                                        <th scope="col" class="text-center">Ancho</th>
                                        <th scope="col" class="text-center">Descuento</th>
                                        <th scope="col" class="text-center">Aumento</th>
                                        <th scope="col" class="text-center">Total</th> -->
                                        <th scope="col" class="text-center">Piezas</th>
                                        <th scope="col" class="text-center">Descuento</th>
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
                                    <td></td>
                                    <td><?php
                                    $barra = 6000;
                                    $totalSumaBarra = 0;
                                    $piezas_2001Total=0;
                                    $suma = 0.004;
                                    $cercano = 0;
                                    $menor =0;
                                    $mayor=0;
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
                                            echo "1";


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

                                                    for ($i=0; $i < $piezas_repeticiones2001; $i++){
                                                    // impresion mas 0.004
                                                   
                                                    echo "|".$restadoSuma2001."|";
                                                
                                                    // // echo $restado.",-,";
                                                   }
                                                }

                                                //la sumatoria total de todos los cortes mas 0.004
                                                echo "=".$totalSumaBarra."<br>";

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
                                                        if( ($a - $restadoalTotal) >= 0){
                                                            $cercano = $a;
                                                            // break;
                                                        }elseif($restadoalTotal < $barra){
                                                            echo "Creada primera barra";
                                                        }
                                                    }
                                                }



                                                unset($saldos[$cercano]);
                                                echo "<br>".$cercano;
                                                foreach($saldos as $a){
                                                    echo "|".$a."|";
                                                }

                                                // echo json_encode($saldos);


                                                $barraMenosSobrante = $totalSumaBarra - $cercano;
                                               
                                                echo "<br>"."Primera Barra= ".($barraMenosSobrante);

                                                echo "<br>"."Segunda Barra= ".($cercano * ($piezas_repeticiones2001 - 1)) ;
                                                echo "<li>Restante: ".$restadoalTotal."</li>";
                                               
                                                echo "<li>Barras: "."2"."</li>";
                                                echo "<li>Corte sacado : ".$cercano."</li>";
                                                echo "<li>Cortes Barra #1: ".$menos_corte."</li>";
                                                echo "<li>Cortes Barra #2: "."1"."</li>";
                                                echo "<li>Cortes Total: ".$piezas_2001Total."</li>";
                                                echo "<li>Cercano: ".$cercano."</li>";
                                           

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
                                    <!-- <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2002 as $barra2002s)
                                    <tr>
                                        <td scope="row">{{ $barra2002s->fam_linea }}</td>
                                     <!--    <td class="text-center">{{ $barra2002s->alto }}</td> 
                                        <td class="text-center">{{ $barra2002s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2002s->restado,3)  }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2002s->restado,3) + 0.004 }}</td>  -->
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
                                  <!--       <td class="text-center">{{ ($barra2002s->restado + 0.004) * $piezas_repeticiones2002}}</td> -->
                                    </tr>
                                @endforeach  
                                <!-- <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td> -->                    
                              </tbody>
                            </table>
                            @endif
                        </div>
                    </div><br>
                    <div class="row">
                         <div class="col-6">
                            @if(count($barra2005) > 0)

                            <p><strong>Resumen 2005 ACA</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2005 as $barra2005s)
                                    <tr>
                                        <td scope="row">{{ $barra2005s->fam_linea }}</td>
                                        <!-- <td class="text-center">{{ $barra2005s->alto }}</td> 
                                        <td class="text-center">{{ $barra2005s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2005s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2005s->restado,3) + 0.004 }}</td>  -->
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
                                        <td class="text-center">{{ number_format($barra2005s->restado,3) }}</td> 
                                        <!-- <td class="text-center">{{ ($barra2005s->restado + 0.004) * $piezas_repeticiones2005}}</td>  -->
                                    </tr>
                                @endforeach   
                                <!-- <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td>  -->                    
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
                                   <!--  <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2009 as $barra2009s)
                                    <tr>
                                         <td scope="row">{{ $barra2009s->fam_linea }}</td>
                                       <!-- <td class="text-center">{{ $barra2009s->alto }}</td> 
                                        <td class="text-center">{{ $barra2009s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2009s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2009s->restado,3) + 0.004 }}</td>  -->
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
                                        <!-- <td class="text-center">{{ ($barra2009s->restado + 0.004) * $piezas_repeticiones2009}}</td> --> 
                                    </tr>
                                @endforeach  
                                <!-- <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td>  -->                       
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
                                    <!-- <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2010 as $barra2010s)
                                    <tr>
                                        <td scope="row">{{ $barra2010s->fam_linea }}</td>
                                        <!-- <td class="text-center">{{ $barra2010s->alto }}</td> 
                                        <td class="text-center">{{ $barra2010s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2010s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2010s->restado,3)  + 0.004}}</td>  -->
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
                                        <!-- <td class="text-center">{{ ($barra2010s->restado + 0.004) * $piezas_repeticiones2010}}</td> --> 
                                    </tr>
                                @endforeach    
                                <!-- <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
                                    $totalSumado = 0;
                                    $suma = 0.004;
                                  
                                    foreach ($barra2010 as $barra2010s) {
                                        $restado = $barra2010s->restado;
                                        $restaSuma = $restado + $suma;
                                        $piezas = $barra2010s->piezas;
                                        $piezas_repeticiones2010 = $piezas * $repeteciones;

                                        $totalMts = $piezas_repeticiones2010 * $restaSuma;

                                        $totalSumado += $totalMts;
                                    }
                                    echo "$totalSumado";
                                ?></td>  -->                  
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
                                    <!-- <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2011 as $barra2011s)
                                    <tr>
                                        <td scope="row">{{ $barra2011s->fam_linea }}</td>
                                    <!--     <td class="text-center">{{ $barra2011s->alto }}</td> 
                                        <td class="text-center">{{ $barra2011s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2011s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2011s->restado,3) + 0.004 }}</td>  -->
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
                                  <!--       <td class="text-center">{{ ($barra2011s->restado + 0.004) * $piezas_repeticiones2011}}</td> -->
                                    </tr>
                                @endforeach 
                              <!--   <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td>  -->                     
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
                                    <!-- <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra5008 as $barra5008s)
                                    <tr>
                                        <td scope="row">{{ $barra5008s->fam_linea }}</td>
                                        <!-- <td class="text-center">{{ $barra2010s->alto }}</td> 
                                        <td class="text-center">{{ $barra2010s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2010s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2010s->restado,3)  + 0.004}}</td>  -->
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
                            <!--             <td class="text-center">{{ ($barra5008s->restado + 0.004) * $piezas_repeticiones5008}}</td>  -->
                                    </tr>
                                @endforeach  
                               <!--  <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td>  -->                      
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
                               <!--      <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2501 as $barra2501s)
                                    <tr>
                                         <td scope="text-center">{{ $barra2501s->fam_linea }}</td>
                                        <!--<td class="text-center">{{ $barra2501s->alto }}</td> 
                                        <td class="text-center">{{ $barra2501s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2501s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2501s->restado,3)  + 0.004}}</td>  -->
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
                                     <!--    <td class="text-center">{{ ($barra2501s->restado + 0.004) * $piezas_repeticiones2501}}</td>  -->
                                    </tr>
                                @endforeach   
                            <!--     <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td>  -->                   
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
                                    <!-- <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2502 as $barra2502s)
                                    <tr>
                                        <td scope="row">{{ $barra2502s->fam_linea }}</td>
                                       <!--  <td class="text-center">{{ $barra2502s->alto }}</td> 
                                        <td class="text-center">{{ $barra2502s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2502s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2502s->restado,3) + 0.004 }}</td>  -->
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
                                      <!--   <td class="text-center">{{ ($barra2502s->restado + 0.004) * $piezas_repeticiones2502 }}</td> -->
                                    </tr>
                                @endforeach  
                               <!--  <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td>  -->                    
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
                                   <!--  <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2505 as $barra2505s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2505s->fam_linea }}</td>
                                        <!-- <td class="text-center">{{ $barra2505s->alto }}</td> 
                                        <td class="text-center">{{ $barra2505s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2505s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2505s->restado,3)  + 0.004}}</td>  -->
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
                                        <!-- <td class="text-center">{{ ($barra2505s->restado + 0.004) * $piezas_repeticiones2505}}</td>  -->
                                    </tr>
                                @endforeach 
                                <!-- <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td>  -->                    
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
                                   <!--  <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2507 as $barra2507s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2507s->fam_linea }}</td>
                                       <!--  <td class="text-center">{{ $barra2507s->alto }}</td> 
                                        <td class="text-center">{{ $barra2507s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2507s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2507s->restado,3)  + 0.004}}</td>  -->
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
                                     <!--    <td class="text-center">{{ ($barra2507s->restado + 0.004) * $piezas_repeticiones2507}}</td>  -->
                                    </tr>
                                @endforeach  
                            <!--     <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td>    -->                  
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
                                    <!-- <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2509 as $barra2509s)
                                    <tr>
                                        <td scope="row">{{ $barra2509s->fam_linea }}</td>
                                        <!-- <td class="text-center">{{ $barra2509s->alto }}</td> 
                                        <td class="text-center">{{ $barra2509s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2509s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2509s->restado,3) + 0.004 }}</td>  -->
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
                                       <!--  <td class="text-center">{{ ($barra2509s->restado + 0.004) * $piezas_repeticiones2509 }}</td> -->
                                    </tr>
                                @endforeach  
                             <!--    <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td> -->                     
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
                                   <!--  <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2510 as $barra2510s)
                                    <tr>
                                        <td scope="row">{{ $barra2510s->fam_linea }}</td>
                                      <!--   <td class="text-center">{{ $barra2510s->alto }}</td> 
                                        <td class="text-center">{{ $barra2510s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2510s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2510s->restado,3) + 0.004 }}</td>  -->
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
                                       <!--  <td class="text-center">{{ ($barra2510s->restado + 0.004) * $piezas_repeticiones2510 }}</td> -->
                                    </tr>
                                @endforeach  
                                <!-- <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td>  -->                    
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
                                            $fam_linea = $barra2504s->fam_linea;
                                            $nombre = $barra2504s->nombre;
                                            $ancho = $barra2504s->largo;
                                            $resta = $barra2504s->resta;
                                            $piezas = $barra2504s->piezas;
                                            $restaRecorte =  $ancho - $resta;

                                            $piezas = $barra2504s->piezas;
                                            $piezas_repeticiones2504 = $piezas * $repeteciones;

                                            echo $piezas_repeticiones2504;
                                        ?></td> 
                                        <td class="text-center">{{ number_format($barra2504s->restado,3)}}</td>
                                        
                                        <td class="text-center">{{ ($barra2504s->restado) * $piezas_repeticiones2504}}</td> 
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
                                        // echo "=".$totalSumaBarra.",---";


                                       
                                        if ($totalSumaBarra > 0.001 && $totalSumaBarra <= 6.000){
                                                echo "1";


                                            }if($totalSumaBarra > 6.000 && $totalSumaBarra <= 12.000){
                                                 

                                                $restadoalTotal = $totalSumaBarra-6.000;
                                                $menos_corte = $piezas_2504Total - 1;     

                                               
                                                $saldos=array();

                                                foreach($barra2504 as $barra2504s){
                                                    $restado = $barra2504s->restado;
                                                    $piezas = $barra2504s->piezas;
                                                    $restadoSuma2504 = $restado + $suma;
                                                     $piezas_repeticiones2504 = $piezas * $repeteciones;
                                                    $piezasDescuento = $piezas_repeticiones2504*$restadoSuma2504;
                                                   
                                                    
                                                    $saldos[] = $restadoSuma2504;

                                                    for ($i=0; $i < $piezas_repeticiones2504; $i++){
                                                    // impresion mas 0.004
                                                   
                                                    echo "|".$restadoSuma2504."|";
                                                
                                                    // // echo $restado.",-,";
                                                   }
                                                }

                                                //la sumatoria total de todos los cortes mas 0.004
                                                echo "=".$totalSumaBarra."<br>";

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



                                                unset($saldos[$cercano]);
                                                echo "<br>".$cercano;
                                                foreach($saldos as $a){
                                                    echo "|".$a."|";
                                                }

                                                // echo json_encode($saldos);


                                                $barraMenosSobrante = $totalSumaBarra - $cercano;
                                               
                                                echo "<br>"."Primera Barra= ".($barraMenosSobrante);

                                                echo "<br>"."Segunda Barra= ".($cercano * ($piezas_repeticiones2504 - 1)) ;
                                                echo "<li>Restante: ".$restadoalTotal."</li>";
                                               
                                                echo "<li>Barras: "."2"."</li>";
                                                echo "<li>Corte sacado : ".$cercano."</li>";
                                                echo "<li>Cortes Barra #1: ".$menos_corte."</li>";
                                                echo "<li>Cortes Barra #2: "."1"."</li>";
                                                echo "<li>Cortes Total: ".$piezas_2504Total."</li>";
                                                echo "<li>Cercano: ".$cercano."</li>";


                                                // echo json_encode($restadoSuma2504);

                                                                            
                                                                    
                                                //Mostramos el resultado
                                                // echo "<li>Menor: ".$menor."</li>";
                                                // echo "<li>Mayor: ".$mayor."</li>";
                                                // echo "<li>Buscado: ".$restadoalTotal."</li>";
                                                // echo "<li>Cercano: ".$cercano."</li>";

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
                                    <!-- <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th> -->
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Descuento</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2521 as $barra2521s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2521s->fam_linea }}</td>
                                  <!--       <td class="text-center">{{ $barra2521s->alto }}</td> 
                                        <td class="text-center">{{ $barra2521s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2521s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2521s->restado,3)  + 0.004}}</td>  -->
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
                                    <!--     <td class="text-center">{{ ($barra2521s->restado + 0.004) * $piezas_repeticiones2521}}</td>  -->
                                    </tr>
                                @endforeach  
                           <!--      <td colspan="2" class="text-center">TOTAL</td>
                                <td colspan="" rowspan="" headers="" style="text-align: center;"><?php
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
                                    echo "$totalSumado";
                                ?></td>   -->                  
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