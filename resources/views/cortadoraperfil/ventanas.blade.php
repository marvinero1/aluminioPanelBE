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
        <div class="float-right">
            <button type="button" class="btn btn-success" onclick="printDiv('areaImprimir')" value="imprimir div">
        <i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
        </div>
        

        <div class="tab-content p-4" id="areaImprimir">
            <div class="col">
                <div class="class">
                <p><strong>Resumen</strong></p>   
                    <table class="table-responsive-sm" border="1">
                      <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">#Ventas</th>
                            <th scope="col" class="text-center">Ventanas</th>
                            <th scope="col" class="text-center">Codigo</th>
                            <th scope="col" class="text-center">Nombre</th>
                            <th scope="col" class="text-center">Medida Descuento</th>
                            <th scope="col" class="text-center">Piezas Cortar</th>
                         <!-- <th scope="col">Handle</th> -->
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($perfil as $perfils)
                            <tr>
                                <td scope="row">{{ $perfils->repeticion }}</td>
                                <td scope="row"><?php
                                   
                                    
                                ?></td>
                                <td style="display:block;"><?php  
                                     //aca el elperfil (barra al)categorias junto a el corte
                                    $id_perfil =  $perfils->id;
                                    $repetecion = $perfils->repeticion;
                                    $familia = $perfils->linea;
                                    $cadena = "V";
                                    $ancho = $perfils->ancho * 1000;
                                    $alto = $perfils->alto * 1000;

                                    

                                    // $cortes_json = json_encode($corte_1);
                                        for ($x = 1; $x <= $repetecion; $x++){

                                            echo "<div class='float-right pr-2' style='padding-top:100px;'>$alto</div>";

                                            // for ($j=1; $j < $l; $j++){ 
                                            //     echo $j;
                                            // }
                                            // echo $cadena.$j."\n";
                                            // echo $x;
                                            
                                            echo $familia."\n".'<img src="/images/cortadora/corteCombi2.png" width="320px">'."\n".'<div class="text-center">'.$ancho.'</div>';

                                            // echo "\n".$ancho;
                                        } 
                                ?></td>
                                
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

                                            $anchoMilesima = $ancho * 1000;

                                            $restaRecorte =  $anchoMilesima - $resta;

                                             
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
                                            $ancho = $barras->largo;
                                            $resta = $barras->resta;
                                            $piezas = $barras->piezas;

                                            $anchoMilesima = $ancho * 1000;

                                            $restaRecorte =  $anchoMilesima - $resta;

                                             
                                            echo "<p>$nombre</p>";
                                                   
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

                                            $anchoMilesima = $ancho * 1000;

                                            $restaRecorte =  $anchoMilesima - $resta;

                                             
                                            echo "<p>$restaRecorte</p>";
                                                   
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

                                            $anchoMilesima = $ancho * 1000;

                                            $restaRecorte =  $anchoMilesima - $resta;

                                             
                                            echo "<p>$piezas</p>";
                                                   
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
         

        <script>
            function printDiv(nombreDiv) {
                console.log("asdsadasdad");
                var contenido = document.getElementById(nombreDiv).innerHTML;
                var contenidoOriginal = document.body.innerHTML;
                document.body.innerHTML = contenido;
                window.print();
                document.body.innerHTML = contenidoOriginal;
            }
        </script>
    </body>
</html>