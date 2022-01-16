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
              </div>
        </nav>

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


        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="float-right p-1">
                <a href="/cortadoraPerfil" class="btn btn-warning">Atras</a>
            </div>
            <div class="float-left p-3">
                <button type="button" class="btn btn-success" onclick="printDiv1('areaImprimir1')" value="imprimir div">
                <i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
            </div><br><br>

            <div class="tab-content p-4" id="areaImprimir1">
                <div class="class">
                    <p><strong>Resumen Linea 20</strong></p>

                    <div class="row">
                        <div class="col-6">
                            <p><strong>Resumen 2001</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2001 as $barra2001s)
                                    <tr>
                                        <td scope="row">{{ $barra2001s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2001s->alto }}</td> 
                                        <td class="text-center">{{ $barra2001s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2001s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{  number_format($barra2001s->restado,3) + 0.004 }}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2001}}</td> 
                                        <td class="text-center">{{ ($barra2001s->restado + 0.004 ) * $piezas_repeticiones2001}}</td>
                                    </tr>
                                    
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                         <div class="col-6">
                            <p><strong>Resumen 2002</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2002 as $barra2002s)
                                    <tr>
                                        <td scope="row">{{ $barra2002s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2002s->alto }}</td> 
                                        <td class="text-center">{{ $barra2002s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2002s->restado,3)  }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2002s->restado,3) + 0.004 }}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2002}}</td> 
                                        <td class="text-center">{{ ($barra2002s->restado + 0.004) * $piezas_repeticiones2002}}</td>
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                        
                    </div><br>
                    <div class="row">
                         <div class="col-6">
                            <p><strong>Resumen 2005</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2005 as $barra2005s)
                                    <tr>
                                        <td scope="row">{{ $barra2005s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2005s->alto }}</td> 
                                        <td class="text-center">{{ $barra2005s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2005s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2005s->restado,3) + 0.004 }}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2005}}</td>
                                        <td class="text-center">{{ ($barra2005s->restado + 0.004) * $piezas_repeticiones2005}}</td> 
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <p><strong>Resumen 2009</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2009 as $barra2009s)
                                    <tr>
                                        <td scope="row">{{ $barra2009s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2009s->alto }}</td> 
                                        <td class="text-center">{{ $barra2009s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2009s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2009s->restado,3) + 0.004 }}</td> 
                                        <td class="text-center">{{ $piezas_repeticiones2009 }}</td> 
                                        <td class="text-center">{{ ($barra2009s->restado + 0.004) * $piezas_repeticiones2009}}</td> 
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                    </div><br>

                     <div class="row">
                         <div class="col-6">
                            <p><strong>Resumen 2010</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                               
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2010 as $barra2010s)
                                    <tr>
                                        <td scope="row">{{ $barra2010s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2010s->alto }}</td> 
                                        <td class="text-center">{{ $barra2010s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2010s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2010s->restado,3)  + 0.004}}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2010}}</td> 
                                        <td class="text-center">{{ ($barra2010s->restado + 0.004) * $piezas_repeticiones2010}}</td> 
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <p><strong>Resumen 2011</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2011 as $barra2011s)
                                    <tr>
                                        <td scope="row">{{ $barra2011s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2011s->alto }}</td> 
                                        <td class="text-center">{{ $barra2011s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2011s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2011s->restado,3) + 0.004 }}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2011}}</td> 
                                        <td class="text-center">{{ ($barra2011s->restado + 0.004) * $piezas_repeticiones2011}}</td>
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                    </div><br><br>

                    <p><strong>Resumen Linea 25</strong> </p>
                    <div class="row">
                         <div class="col-6">
                            <p><strong>Resumen 2501</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2501 as $barra2501s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2501s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2501s->alto }}</td> 
                                        <td class="text-center">{{ $barra2501s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2501s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2501s->restado,3)  + 0.004}}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2501}}</td> 
                                        <td class="text-center">{{ ($barra2501s->restado + 0.004) * $piezas_repeticiones2501}}</td> 
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <p><strong>Resumen 2502</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2502 as $barra2502s)
                                    <tr>
                                        <td scope="row">{{ $barra2502s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2502s->alto }}</td> 
                                        <td class="text-center">{{ $barra2502s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2502s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2502s->restado,3) + 0.004 }}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2502}}</td> 
                                        <td class="text-center">{{ ($barra2502s->restado + 0.004) * $piezas_repeticiones2502 }}</td>
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                    </div><br>

                    <div class="row">
                         <div class="col-6">
                            <p><strong>Resumen 2505</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2505 as $barra2505s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2505s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2505s->alto }}</td> 
                                        <td class="text-center">{{ $barra2505s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2505s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2505s->restado,3)  + 0.004}}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2505}}</td> 
                                        <td class="text-center">{{ ($barra2505s->restado + 0.004) * $piezas_repeticiones2505}}</td> 
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                         <div class="col-6">
                            <p><strong>Resumen 2507</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2507 as $barra2507s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2507s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2507s->alto }}</td> 
                                        <td class="text-center">{{ $barra2507s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2507s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2507s->restado,3)  + 0.004}}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2507}}</td> 
                                        <td class="text-center">{{ ($barra2507s->restado + 0.004) * $piezas_repeticiones2507}}</td> 
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                    </div><br>


                    <div class="row">
                        <div class="col-6">
                            <p><strong>Resumen 2509</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2509 as $barra2509s)
                                    <tr>
                                        <td scope="row">{{ $barra2509s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2509s->alto }}</td> 
                                        <td class="text-center">{{ $barra2509s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2509s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2509s->restado,3) + 0.004 }}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2509}}</td> 
                                        <td class="text-center">{{ ($barra2509s->restado + 0.004) * $piezas_repeticiones2509 }}</td>
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <p><strong>Resumen 2510</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2510 as $barra2510s)
                                    <tr>
                                        <td scope="row">{{ $barra2510s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2510s->alto }}</td> 
                                        <td class="text-center">{{ $barra2510s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2510s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2510s->restado,3) + 0.004 }}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2509}}</td> 
                                        <td class="text-center">{{ ($barra2510s->restado + 0.004) * $piezas_repeticiones2510 }}</td>
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                    </div><br>

                       <div class="row">
                         <div class="col-6">
                            <p><strong>Resumen 2504</strong></p>   
                            <table class="table-responsive-sm" border="1">
                              <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ventana</th>
                                    <th scope="col" class="text-center">Alto</th>
                                    <th scope="col" class="text-center">Ancho</th>
                                    <th scope="col" class="text-center">Descuento</th>
                                    <th scope="col" class="text-center">Aumento</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center">Piezas</th>
                                    <th scope="col" class="text-center">Total Mts</th>

                                </tr>
                              </thead>

                              <tbody>
                                @foreach($barra2504 as $barra2504s)
                                    <tr>
                                        <td scope="text-center">{{ $barra2504s->fam_linea }}</td>
                                        <td class="text-center">{{ $barra2504s->alto }}</td> 
                                        <td class="text-center">{{ $barra2504s->ancho }}</td> 
                                        <td class="text-center">{{ number_format($barra2504s->restado,3) }}</td> 
                                        <td class="text-center">0.004</td> 
                                        <td class="text-center">{{ number_format($barra2504s->restado,3)  + 0.004}}</td> 
                                        <td class="text-center">{{$piezas_repeticiones2505}}</td> 
                                        <td class="text-center">{{ ($barra2504s->restado + 0.004) * $piezas_repeticiones2504}}</td> 
                                    </tr>
                                @endforeach                      
                              </tbody>
                            </table>
                        </div>
                 
                    </div>
                </div>
            </div>
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
             function printDiv1(nombreDiv) {
                
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