<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" type="image/x-icon" href="../images/logo.png">
  <title>Sistema</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      <?php 
        require_once("../controllers/index_controller.php");
        $reporte=$index->getSalesbyDay();
        $vendidos=$index->motsSoldProducts();
      ?>
      function drawChart() {
        //Grafico ventas por dia
        var data = google.visualization.arrayToDataTable([
          ['Dia', 'Ventas'],
        <?php foreach($reporte as $key => $value): ?>
          ['<?php echo $value['Dia']; ?>',  <?php echo $value['Ventas']; ?>],
          <?php endforeach; ?>
        ]);

        var options = {
          title: 'Ventas por día de esta semana.',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);

        //Grafico productos mas vendidos
        var staticData = google.visualization.arrayToDataTable([
          ['Producto', 'Total'],
        <?php foreach($vendidos as $key => $value): ?>
          ['<?php echo $value['producto']; ?>', <?php echo $value['total']; ?>],
        <?php endforeach; ?>
        ]);
        
        var staticOptions = {
          title: 'Productos más vendidos de la semana.',
          legend: { position: 'bottom' }
        };

        var staticChart = new google.visualization.ColumnChart(document.getElementById('column_chart'));
        staticChart.draw(staticData, staticOptions);
      }
    </script>
</head>
<body>