
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
	<div  class="container">
		<div class="row">
	    <div class="col">
	      <img src="/images/cortadora/combinacion1.png" width="250px">
	    </div>
	    <div class="col">
	            <img src="/images/cortadora/corteCombi1.png" width="450px">

	    </div>
  	</div><br>
  	<!-- modal para la  barra -->

  	<div class="float-right">
        <div class="row">
            <div class="col-md-6">
               <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                Añadir Barra 
            </button> 
        </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCorte">
                    Añadir Corte 
                </button>
            </div>
        </div>
        <!-- Button trigger modal -->
		
    </div><br><br>


    
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
                    <img src="/images/cortadora/corteCombi1.png" width="450px">
                </div>

	            <div class="container">
                    <div class="row">
                        <div class="col">
                         <div class="input-group">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                              </div>
                              <select class="custom-select" id="inputGroupSelect01" name="categoria" required>
                               <!--  <option selected>Choose...</option> -->
                                <option value="L-20">Linea 20</option>
                                <option value="L-21">Linea 21</option>
                                <option value="L-22">Linea 22</option>
                              </select>
                            </div>
                        </div>
                        <div class="col">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Lado</label>
                              </div>
                              <select class="custom-select" id="inputGroupSelect01" name="lado" required>
                                <!-- <option selected>Choose...</option> -->
                                <option value="x1">X1</option>
                                <option value="x2">X2</option>
                                <option value="x3">X3</option>
                                <option value="x4">X4</option>
                                <option value="x5">X5</option>
                                <option value="x6">X6</option>
                              </select>
                            </div>
                        </div>
                    </div>
	            	
                    <input hidden type="text" value="{{ $perfil_id }}" name="perfil_id">
                    <input hidden type="number" value="6" name="largo">
					<p></p>
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

    <!-- modal corte -->

    <div class="modal fade" id="exampleModalCorte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
          <div class="modal-header" style="display: block;">
            <h5 class="modal-title " id="exampleModalLabel">Crear Corte</h5>
          </div>
          <form action="{{route('barra.store')}}" method="POST" >
                        {{ csrf_field() }}
          <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <img src="/images/cortadora/corteCombi1.png" width="450px">
                    </div>

                    <div class="col">
                        <div class="input-group mb-3">
                             <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Barra</label>
                          </div>
                            <select name="categorias_id" class="custom-select" data-live-search="true" required>
                                @foreach ($barra as $barras)
                                <option value="{{ $barras->id }}">{{$barras->categoria }} - {{$barras->lado}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <div class="input-group mb-3">
                              <div class="input-group-prepend ">
                                <label class="input-group-text " for="inputGroupSelect01">Corte #</label>
                              </div>
                              <select class="custom-select" id="inputGroupSelect01" name="lado" required>
                                <option value="corte_1">1</option>
                                <option value="corte_2">2</option>
                                <option value="corte_3">3</option>
                                <option value="corte_4">4</option>
                                <option value="corte_5">5</option>
                                <option value="corte_6">6</option>
                                <option value="corte_7">7</option>
                                <option value="corte_8">8</option>
                                <option value="corte_9">9</option>
                                <option value="corte_10">10</option>
                                <option value="corte_11">11</option>
                                <option value="corte_12">12</option>
                              </select>
                        </div>
                    </div> -->
                                    
                    <div class="input-group mb-3 p-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Corte #1</span>
                      </div>
                      <input type="text" class="form-control" name="corte_1">
                    </div>
                    
                    <input hidden type="text" value="{{ $perfil_id }}" name="perfil_id">               
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-warning">Cortar</button>
          </div>
        </form>
        </div>
      </div>
    </div>



    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>	
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
                    text: 'Cortadora de Perfiles de Aluminio'
                },
                xAxis: {
                    categories: [ <?php 
                    foreach($barra as $barras){ //aca el elperfil (barra al)categorias junto a el corte
           
                        $categorias = $barras->categoria;
                        $cate_json = json_encode($categorias).",";
                        echo $cate_json;           
                    }?>
                ] 
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total Metros'
                    }
                },
                legend: {
                    reversed: true
                },
                plotOptions: {
                    series: {
                        stacking: 'normal'
                    }
                },
                series: [
                {
                    name: 'Total',
                    data: [<?php 
                    foreach($barra as $barras){ //aca el elperfil (barra al)categorias junto a el corte
           
                        $largos = $barras->largo;
                        $largos_json = json_encode($largos).",";
                        echo $largos_json;           
                    } ?>]
                },
                {   

                    name: 'Corte 1',
                    data: [<?php 
                     foreach($corte as $cortes){ //aca el perfil (barra al)categorias junto a el corte
           
                        $corte_1 = $cortes->corte_1;
                      
                        echo $corte_1;  
                    } ?>]
                }, 
                ]
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
