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
    <div>
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
                                             $piezas_repeticiones2504 = $piezas * $repeteciones;
                                            $piezasDescuento = $piezas_repeticiones2504*$restadoSuma2001;
                                           
                                            $saldos[] = $restadoSuma2001;
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
                                       
                                        echo "Primera Barra= ".($barraMenosSobrante);

                                        {{-- echo "<br>"."Segunda Barra= ".($cercano * ($piezas_repeticiones2001 - 1)) ; --}}

                                        echo "<br>"."Segunda Barra= ".($cercano);
                                        echo "<li>Restante: ".$restadoalTotal."</li>";
                                       
                                        echo "<li>Barras: "."2"."</li>";
                                        echo "<li>Corte sacado : ".$cercano."</li>";
                                        echo "<li>Cortes Barra #1: ".$menos_corte."</li>";
                                        echo "<li>Cortes Barra #2: "."1"."</li>";
                                        echo "<li>Cortes Total: ".$piezas_2001Total."</li>";
                                        echo "<li>Cercano: ".$cercano."</li>";

                                       
                                        foreach($barra2504 as $barra2001s){
                                            $restado = $barra2001s->restado;
                                            $piezas = $barra2001s->piezas;
                                            $restadoSuma2001 = $restado + $suma;
                                             $piezas_repeticiones2001 = $piezas * $repeteciones;
                                            $piezasDescuento = $piezas_repeticiones2001*$restadoSuma2001;
                                            
                                            $saldos[] = $restadoSuma2001;

                                        }

                                        {{-- PRIMERA BARRA --}}
                                        echo "<div><strong>Primera Barra</strong></div>";
                                        unset($saldos[$cercano]);
                                        echo $cercano;
                                        foreach($saldos as $a){
                                            echo "|".$a."|";
                                        }

                                        //la sumatoria total de todos los cortes mas 0.004
                                        $p = $totalSumaBarra - $cercano;
                                        echo "=".($p)."<br>";

                                        echo "<div><strong>Segunda Barra</strong></div>";


                                        echo "|".$cercano."|"."="."$cercano";
                                   

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
                                $sumaTotadataSaldos=0;
                                $total=0;

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


                                            $dataSaldos[] = [
                                            ["barra"=>$restadoSuma2504,"repeticion"=>$piezas_repeticiones2504, "total"=>($restadoSuma2504 * $piezas_repeticiones2504)]
                                            ];   
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
                                        echo "<li>Total: ".$totalSumaBarra."</li>";

                                        echo "<li>Restante: ".$restadoalTotal."</li>";
                                       
                                        echo "<li>Barras: "."2"."</li>";
                                        echo "<li>Corte sacado : ".$cercano."</li>";
                                        echo "<li>Cortes Barra #1: ".$menos_corte."</li>";
                                        echo "<li>Cortes Barra #2: "."1"."</li>";
                                        echo "<li>Cortes Total: ".$piezas_2504Total."</li>";
                                        echo "<li>Cercano: ".$cercano."</li>";

                                       
                                        foreach($barra2504 as $barra2504s){
                                            $restado = $barra2504s->restado;
                                            $piezas = $barra2504s->piezas;
                                            $restadoSuma2504 = $restado + $suma;
                                             $piezas_repeticiones2504 = $piezas * $repeteciones;
                                            $piezasDescuento = $piezas_repeticiones2504*$restadoSuma2504;
                                            
                                            $saldos[] = $restadoSuma2504;

                                            $repeat = ($restadoSuma2504) * $piezas_repeticiones2504;       
                                        }

                                         {{-- echo json_encode($dataSaldos); --}}
                                    


                                        {{-- PRIMERA BARRA --}}
                                        echo "<div><strong>Primera Barra</strong></div>";

                                        $p1 = $dataSaldos[$cercano];
                                        echo json_encode($p1);

                                        foreach($p1 as $p1s){
                                            //total suma
                                            $totalSumaaa = $p1s["total"]; 
                                            echo "=".$totalSumaaa;
                                        }
                                        

                                        {{-- SEGUNDA BARRA --}} 

                                        echo "<div><strong>Segunda Barra</strong></div>";
                                                                            
                                        unset($dataSaldos[$cercano]);

                                        $p2 = $dataSaldos;
                                        echo json_encode($p2);

                                      
                                        {{-- echo $totalSumaaa;  --}}

                                        //la sumatoria total de todos los cortes mas 0.004

                                       {{--  $p = $totalSumaBarra - $cercano; --}}    

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
</body>