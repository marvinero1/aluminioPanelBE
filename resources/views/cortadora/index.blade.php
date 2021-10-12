<?php echo 'Hello Word'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="cortadora.css" rel="stylesheet" type="text/css">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/treemap.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


</head>

<body>
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">

            Heatmap showing employee data per weekday. Heatmaps are commonly used to
            visualize hot spots within data sets, and to show patterns or correlations.
            Due to their compact nature, they are often used with large sets of data.
        </p>
    </figure>
    <script>
       

        Highcharts.chart('container', {
  series: [{
    type: "treemap",
    layoutAlgorithm: 'stripes',
    alternateStartingDirection: true,
    levels: [{
      level: 1,
      layoutAlgorithm: 'sliceAndDice',
      dataLabels: {
        enabled: true,
        align: 'left',
        verticalAlign: 'top',
        style: {
          fontSize: '15px',
          fontWeight: 'bold'
        }
      }
    }],
    data: [{
      id: 'A',
      name: 'Apples',
      color: "#EC2500"
    }, {
      id: 'B',
      name: 'Bananas',
      color: "#ECE100"
    }, {
      id: 'O',
      name: 'Oranges',
      color: '#EC9800'
    }, {
      name: 'Anne',
      parent: 'A',
      value: 5
    }, {
      name: 'Rick',
      parent: 'A',
      value: 3
    }, {
      name: 'Peter',
      parent: 'A',
      value: 4
    }, {
      name: 'Anne',
      parent: 'B',
      value: 4
    }, {
      name: 'Rick',
      parent: 'B',
      value: 10
    }, {
      name: 'Peter',
      parent: 'B',
      value: 1
    }, {
      name: 'Anne',
      parent: 'O',
      value: 1
    }, {
      name: 'Rick',
      parent: 'O',
      value: 3
    }, {
      name: 'Peter',
      parent: 'O',
      value: 3
    }, {
      name: 'Susanne',
      parent: 'Kiwi',
      value: 2,
      color: '#9EDE00'
    }]
  }],
  title: {
    text: 'Fruit consumption'
  }
});
    </script>
</body>

</html>