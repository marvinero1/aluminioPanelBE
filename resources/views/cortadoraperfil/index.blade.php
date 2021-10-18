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

<body onload="script();">
    <div class="col-12">
        <div class="p-4">
            <form action="{{route('categoria.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">

                    <div class="col-12" style="border: outset;">
                        <h4>Hoja De calculo</h4>
                        <div class="row p-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label><strong>Nombre *</strong> </label>

                                    <input type="text" class="form-control" name="nombre" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label><strong>Categoria *</strong> </label>
                                <select name="categorias_id" class="form-control" style="width: 100% !important"
                                    data-live-search="true" required>
                                    @foreach ($categoria as $categorias)
                                    <option value="{{ $categorias->id }}">{{$categorias->nombre}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            

                            <div class="col-md-4">
                                <div class="form-group">
                                <label><strong>Total Mts*</strong> </label>

                                    <input type="number" class="form-control" name="total" >
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="user_id" hidden value="{{Auth::user()->id}}">
                            </div>

                            <button type="submit" class="btn btn-success float-left mr-2 "><i class="fa fas fa-save"></i> Crear
                        Hoja de Calculo</button>
                        </div>
                    </div>
                </div>
            </form>
        </div><br><br>



        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Registro Perfil Aluminio</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('categoria.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Total Mts Perfil</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Perfil Aluminio Mts"
                                    required>
                            </div>
                        </div>
                        {{-- 
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="user" hidden="true" value="{{Auth::user()->name}}">
                    </div>
                </div> --}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        {{-- <a type="button" class="btn btn-secondary float-right" href="{{url('/categoria')}}">Cerrar</a> --}}
        <button type="submit" class="btn btn-primary float-right mr-2"><i class="fa fas fa-save"></i> Dibujar</button>
    </div>
    </form>
    </div>
    </div>



    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            Chart showing stacked horizontal bars. This type of visualization is
            great for comparing data that accumulates up to a sum.
        </p>
    </figure>
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
                    categories: ['L-20', 'L-21'] //aca categorias
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total M'
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
                series: [{
                    name: 'Total',
                    data: [0]
                }, {
                    name: 'Corte 1',
                    data: [5, 2]
                }, {
                    name: 'Corte 2',
                    data: [3 ,1]
                }, {
                    name: 'Corte 3',
                    data: [2,10]
                }]
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
