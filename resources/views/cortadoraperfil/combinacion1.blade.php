
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
    <script src="https://use.fontawesome.com/43b1b9da3e.js"></script>

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
                    @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
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

<body onload="script();">
    <div class="float-right p-2">
        <button class="btn btn-warning" onclick="goBack()">Atras</button>
    </div>
    <script>
        function goBack() {
          window.history.back();
        }
    </script>


    <nav class="p-3"> 
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
       <!--  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Hoja 1</a> -->
        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Hoja 2</a>
      <!--   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Hoja 3</a> -->
        <a class="nav-item nav-link" id="nav-help-tab" data-toggle="tab" href="#nav-help" role="tab" aria-controls="nav-help" aria-selected="false">Hoja 4</a>
        <a class="nav-item nav-link " id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">Hoja 5</a>
      </div>
    </nav>
    

  <!--   <div class="tab-content p-4" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

         <div class="row"> 
            <table>
                <tr>
                    <?php  
                    foreach($perfil as $perfils){
                        //aca el elperfil (barra al)categorias junto a el corte
                        $id_perfil =  $perfils->id;
                        $repetecion = $perfils->repeticion;
                        $familia = $perfils->linea;
                        $cadena = "V";
                        // $ancho = $perfils->ancho * 1000;
                        // $alto = $perfils->alto * 1000;
                        $combinacion = $perfils->combinacion;

                        // $cortes_json = json_encode($corte_1);
                            for ($x = 1; $x <= $repetecion; $x++){

                                // echo "<div class='float-right pr-2' style='padding-top:100px;'>$alto</div>";

                                // for ($j=1; $j < $l; $j++){ 
                                //     echo $j;
                                // }
                                // echo $cadena.$j."\n";
                                // echo $x;
                                
                                if ($combinacion == 'combinacion1') {
                                    echo '<img src="/images/cortadora/corteCombi2.png" width="220px">'."\n".'<div class="text-center"></div>';
                                } elseif ($combinacion == 'combinacion4') {
                                    echo '<img src="/images/cortadora/combinacion4_1.png" width="230px">'."\n".'<div class="text-center"></div>';
                                } else {
                                    echo '<img src="/images/cortadora/combinacion5_1.png" width="250px">'."\n".'<div class="text-center"></div>';
                                }
                            } 
                        }?>
                </tr>  
            </table>
        </div>
    </div> -->
    
    <!-- SEGUNDA HOJA -->
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="float-right">
            <div class="row">
                <div class="col-md-6">
                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-bars" aria-hidden="true"></i> Crear Conjunto de Barras 
                    </button> 
                </div>
                <!-- <div class="col-md-6">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCorte">
                        Añadir Corte 
                    </button>
                </div> -->
            </div>
         </div><br><br>
        <div  class="container">
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>   
        </div>
    </div> 


    <!-- TERCERA HOJA -->    
    <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <div class="row">
            <div class="col">
               <div class="class">
                <p><strong>Resumen</strong></p>   
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">Linea y Familia</th>
                          <th scope="col" class="text-center">#Barras a Usar</th>
                          <th scope="col" class="text-center">Cortes</th>
                          <th scope="col" class="text-center">Tamaño del Corte</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($barra as $barras)

                        <tr>
                          <th scope="row" class="text-center">{{ $barras->fam_linea}}, {{ $barras->nombre}} </th>
                            <th scope="row" class="text-center">
                                <?php
                                    $piezas = $barras->piezas;

                                    $piezas_repeticiones = $piezas * $repetecion;
                                    $piezas_div = $piezas_repeticiones / 10;

                                    // echo  $piezas_div."---";

                                    $numBarras = ceil($division);
                                     // echo($numBarras."---");

                                    $piezas_div1 = $piezas_div * $numBarras;
                                    
                                     echo($piezas_div1);
                                ?>
                            </th>
                            <th scope="row" class="text-center"><?php
                                echo($repetecion);
                            ?></th>
                            <th scope="row" class="text-center"><?php
                                echo($ancho_barra).' Metros';
                            ?></th>
                       
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                </div> 
            </div>
            <div class="col p-3">
                <p><?php 
                    //aca el elperfil (barra al)categorias junto a el corte
                    foreach($barra as $barras){ //aca el elperfil (barra al)categorias junto a el corte
               
                    $categorias = $barras->fam_linea;
                    $nombre = $barras->nombre;
                    $largos =  $barras->largo;  
                    $cate_json = json_encode($categorias.'-'.$nombre).",";

                    $resumen = ""."\n"."Para la barra ".$cate_json." Se necesitara la cantidad de ".number_format($division, 3)." barras de ".$largo_predeterminado." Metros.\n";
                        echo nl2br($resumen);                     
                    }
                        
                ?></p>
            </div>
        </div>
    </div>  -->

    <!-- Cuarta Hoja -->
     <div class="tab-pane fade" id="nav-help" role="tabpanel" aria-labelledby="nav-help-tab">
        <p><strong>Cotización</strong></p>
            <table class="table table-bordered">
                  <thead>
                    <td colspan="2" class="text-center">Linea: <strong><?php 
                        echo($linea);
                    ?></strong> </td>
                    <tr>
                      <th scope="col" class="text-center">Linea</th>
                      <th scope="col" class="text-center">#Barras a Usar</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                   @foreach($barra as $barras)
                    <tr>
                      <th scope="row" class="text-center">{{ $barras->fam_linea}}, {{ $barras->nombre}} </th>
                        <th scope="row" class="text-center"><?php
                            $numBarras = ceil($division);
                            echo($numBarras);
                        ?></th>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>

    <!-- Quinta Hoja -->
     <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
        <p><strong>Resumen</strong></p>
        <div class="container">
          <div class="row">
            <div class="col">
                <p><strong>Con Resta</strong></p>
              <table class="table table-bordered">
                  <thead>
                    <td colspan="3" class="text-center">Linea: <strong><?php 
                        echo($linea);
                    ?></strong> </td>
                    <tr>
                      <th scope="col" class="text-center">Linea</th>
                      <th scope="col" class="text-center">#Barras a Usar</th>
                      <th scope="col" class="text-center">Ancho - Recorte</th>
                      <th scope="col" class="text-center">#Piezas</th>
                      <th scope="col" class="text-center">#Repeticiones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($barra as $barras)
                    <tr>
                      <th scope="row" class="text-center">{{ $barras->fam_linea}} </th>
                        <th scope="row" class="text-center"><?php
                            $piezas = $barras->piezas;
                            $combinacion = $barras->combinacion;
                            $piezas_repeticiones = $piezas * $repetecion;
                            $piezas_div = $piezas_repeticiones / 10;
                            $piezas_div1 = $piezas_div * $division;
                            $piezas_div1 = ceil($piezas_div1);
                            
                             echo($piezas_repeticiones);                          
                        ?></th>

                        <th scope="row" class="text-center">{{ number_format($barras->restado, 3) }}</th>                       
                        <th scope="row" class="text-center">{{ $barras->piezas }}</th>
                        <th scope="row" class="text-center"><?php
                            $piezas = $barras->piezas;

                            $piezas_repeticiones = $piezas * $repetecion;
                            echo  $piezas_repeticiones;
                        ?></th>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
            </div>
          </div>
        </div>
     </div>
    </div>
        
        <!-- modal aneadir corte -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
              <div class="modal-header" style="display: block;">
                <h5 class="modal-title" id="exampleModalLabel">Crear Barra</h5>
              </div>
                <form action="{{route('barra.store')}}" method="POST" >
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="col">
                            <?php  
                                foreach($perfil as $perfils){
                                    //aca el elperfil (barra al)categorias junto a el corte
                                    $id_perfil =  $perfils->id;
                                    $repetecion = $perfils->repeticion;
                                    $familia = $perfils->linea;
                                    $cadena = "V";
                                    // $ancho = $perfils->ancho * 1000;
                                    // $alto = $perfils->alto * 1000;
                                    $combinacion = $perfils->combinacion;

                                                                          
                                        if ($combinacion == 'combinacion1') {
                                            echo '<img src="/images/cortadora/corteCombi2.png" width="350px">'."\n".'<div class="text-center"></div>';
                                        } elseif ($combinacion == 'combinacion4') {
                                            echo '<img src="/images/cortadora/combinacion4_1.png" width="350px">'."\n".'<div class="text-center"></div>';
                                        } else {
                                            echo '<img src="/images/cortadora/combinacion5_1.png" width="350px">'."\n".'<div class="text-center"></div>';
                                        }
                                        
                            }?>
                        </div><br>
                        <div class="container">
                          <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Linea</span>
                                    </div>
                                   <!--  <?php
                                        foreach($perfil as $perfils){
                                            $linea = $perfils->linea;
                                        
                                            if($linea != "L-20") {
                                                echo "<input type='text' class='form-control' value='L-25' name='linea'>";
                                            } else {
                                                echo "<input type='text' class='form-control' value='L-20' name='linea'>";
                                            } 
                                        }   
                                    ?> -->
                                </div>
                            </div>
                       
                          </div><br>

                            <input hidden type="text" value="{{ $perfil_id }}" name="perfil_id">
                            <input hidden type="text" value="{{ $ancho_barra }}" name="ancho">  
                            <input hidden type="text" value="{{ $alto_barra }}" name="alto">  

                            <input hidden type="text" value="{{ $hoja_id }}" name="hoja_id">
                            <input hidden type="text" value="{{ $combinacion }}" name="combinacion">  

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>

      </div>
	    
    <script>
        window.onload = function Onit() {
            this.getValueCut();
            this.dibujar();
        }

        function getValueCut() {
            return console.log("Hola");
        }

        function dibujar() {

            Highcharts.chart('container', {
              chart: {
                type: 'bar'
              },
              title: {
                text: 'Cortadora para perfiles de Aluminio'
              },
              subtitle: {
                text: 'Source: <a href="https://altools.es">Altools.es</a>'
              },
              xAxis: {
                categories: [ <?php 


                    for ($i=0; $i <= $division; $i++) {
                        foreach($barra as $barras){ //aca el elperfil (barra al)categorias junto a el corte
           
                        $categorias = $barras->fam_linea;
                        $nombre = $barras->nombre;
                        
                        $cate_json = json_encode($categorias.', '.$nombre).",";
                        echo $cate_json;

                        // $a = [$categorias.', '.$nombre];

                        // sort($a,);
                               
                        }
                    }
                    ?>],
                title: {
                  text: null
                }
              },
              yAxis: {
                min: 0,
                title: {
                  text: 'Metros',
                  align: 'high'
                },
                labels: {
                  overflow: 'justify'
                }
              },
              tooltip: {
                valueSuffix: ' metros'
              },
              plotOptions: {
                bar: {
                  dataLabels: {
                    enabled: true
                  }
                }
              },
              // legend: {
              //   layout: 'vertical',
              //   align: 'right',
              //   verticalAlign: 'top',
              //   x: -40,
              //   y: 80,
              //   floating: true,
              //   borderWidth: 1,
              //   backgroundColor:
              //     Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
              //   shadow: true
              // },
              credits: {
                enabled: true
              },
              series: [
              {
                name: 'Barra ',
                data: [<?php
                    // for ($i=0; $i <= $division; $i++) {

                        foreach($barra as $barras){
                            // $linea_barra = $barras->linea;
                            $ancho = $barras->ancho;
                            echo $ancho.",";
                        }                              
                    // }                               
                ?>]
                }, 
               
              ],

              
             
                    
            
              
            });
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