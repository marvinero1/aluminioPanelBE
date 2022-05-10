@extends('layouts.main')


@section('content')

<style>.highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 700px;
        margin: 1em auto;
    }
    
    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }
    
    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }
    
    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }
    
    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }
    
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>
<div class="content-wrapper pt-3">
    {{-- HojaVidiro --}}
    <section class="content">
        <div class="card-body table-responsive">
            <table class="table table-sm table-striped table-valign-middle ">
                <thead>
                    <tr>
                        <th style="text-align:center;">Nombre Cliente</th>
                        <th style="text-align:center;">Alto Lamina</th>
                        <th style="text-align:center;">Ancho Lamina</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hojaVidrio as $hojaVidrios)
                        <tr>
                            <td style="text-align:center;">{{ $hojaVidrios->nombre_cliente }}</td>
                            <td style="text-align:center;">{{ $hojaVidrios->alto_lamina }}</td>
                            <td style="text-align:center;">{{ $hojaVidrios->ancho_lamina }}</td>                
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- CalculosVidrio --}}
    <section class="content">
        <div class="card-body table-responsive">
            <table class="table table-sm table-striped table-valign-middle ">
                <thead>
                    <tr>
                        <th style="text-align:center;">Alto</th>
                        <th style="text-align:center;">Ancho</th>
                        <th style="text-align:center;">Piezas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calculoVidrio as $calculoVidrios)
                        <tr>
                            <td style="text-align:center;">{{ $calculoVidrios->numero1 }}</td>
                            <td style="text-align:center;">{{ $calculoVidrios->numero2 }}</td>
                            <td style="text-align:center;">{{ $calculoVidrios->piezas }}</td>                
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description text-center pt-2">
            Diagrama para Gradico de Simulación de Vidrio
        </p>
    </figure>
</div>

<script>
    Highcharts.chart('container', {
    colorAxis: {
        minColor: '#FFFFFF',
        maxColor: Highcharts.getOptions().colors[0]
    },
    series: [{
        type: 'treemap',
        layoutAlgorithm: 'squarified',
        data: [{
            name: 'A',
            value: 6,
            colorValue: 1
        }, {
            name: 'B',
            value: 6,
            colorValue: 2
        }, {
            name: 'C',
            value: 4,
            colorValue: 3
        }, {
            name: 'D',
            value: 3,
            colorValue: 4
        }, {
            name: 'E',
            value: 2,
            colorValue: 5
        }, {
            name: 'F',
            value: 2,
            colorValue: 6
        }, {
            name: 'G',
            value: 1,
            colorValue: 7
        }]
    }],
    title: {
        text: 'Highcharts Treemap'
    }
});
</script>



@endsection