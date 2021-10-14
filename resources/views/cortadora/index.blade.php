<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>

<h1>Chart JS Stacked Bar example</h1>
<div class="wrapper">
    <canvas id="chart"></canvas>
</div>

<script>
    var ctx = document.getElementById("chart");

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Risk Level'],
            datasets: [{
                    label: 'Low',
                    data: [{x: 10, y: 20}, {x: 15, y: null}, {x: 20, y: 10}],
                    backgroundColor: '#D6E9C6',
                },
                {
                    label: 'Moderate',
                    data: [20.7],
                    backgroundColor: '#FAEBCC',
                },
                {
                    label: 'High',
                    data: [11.4],
                    backgroundColor: '#EBCCD1',
                }
            ]
        },
        options: {
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });

</script>
<style>
    body,
    html {
        background: #181E24;
        padding-top: 10px;
    }

    .wrapper {
        width: 60%;
        display: block;
        overflow: hidden;
        margin: 0 auto;
        padding: 60px 50px;
        background: #fff;
        border-radius: 4px;
    }

    canvas {
        background: #fff;
        height: 400px;
    }

    h1 {
        font-family: Roboto;
        color: #fff;
        margin-top: 50px;
        font-weight: 200;
        text-align: center;
        display: block;
        text-decoration: none;
    }

</style>
