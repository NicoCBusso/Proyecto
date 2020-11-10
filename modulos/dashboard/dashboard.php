<!DOCTYPE html>
<html>
<head>
  <script src="../../static/vendors/Chart.js/dist/Chart.min.js"></script>
	<title>Glou Glou</title>
</head>
<body>

  <?php 
    require_once "../../utils/graficosEstadisticos/consultas.php";
    $cantidadVentas = cantidadVendidas();
    $cantidadCompras = cantidadCompradas();
    $totalVendidoPorMes = totalVendidoPorMes();
    //var_dump($cantidadCompras);
    //exit;    
  ?>

	<?php require_once "../../menu.php"; ?>

	<div class="right_col" role="main">
          <!-- top tiles -->

          <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Cantidad de ventas hasta el dia</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="myChartVenta"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Cantidad de compras hasta el dia</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="myChartCompra"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Total vendido</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="myChartTotalVendido"></canvas>
              </div>
            </div>
          </div>         
    </div>
    <script>
    var labelsVenta_db = [];
    var dataVenta_db = [];

    var labelsCompra_db = [];
    var dataCompra_db = [];

    var labelsTotalVendidoPorMes_db = [];
    var dataTotalVendidoPorMes_db = [];

    var colors = [];

    <?php foreach ($cantidadVentas as $cantidadVendidas): ?>
      labelsVenta_db.push('<?php echo $cantidadVendidas['descripcion']; ?>');
      dataVenta_db.push('<?php echo $cantidadVendidas['cantidad']; ?>');
    <?php endforeach; ?>

    <?php foreach ($cantidadCompras as $cantidadCompradas): ?>
      labelsCompra_db.push('<?php echo $cantidadCompradas['descripcion']; ?>');
      dataCompra_db.push('<?php echo $cantidadCompradas['cantidad']; ?>');
    <?php endforeach; ?>

    <?php foreach ($totalVendidoPorMes as $totalVendido): ?>
      labelsTotalVendidoPorMes_db.push('<?php echo $totalVendido['mes']; ?>');
      dataTotalVendidoPorMes_db.push('<?php echo $totalVendido['total']; ?>');
    <?php endforeach; ?>

    console.log(labelsVenta_db);
    console.log(dataVenta_db);
    console.log(labelsCompra_db);
    console.log(dataCompra_db);
    console.log(dataTotalVendidoPorMes_db);
    var randomColorFactor = function() {
    return Math.round(Math.random() * 255);
    };
    var randomColor = function() {
    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
    };

    var ctx = document.getElementById('myChartVenta').getContext('2d');
    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: labelsVenta_db,
          datasets: [{
              label:'',
              data: dataVenta_db,
              backgroundColor: [
                  'rgba(255,99,132,0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255,99,132,0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1,
              hoverBackgroundColor: "rgba(255,99,132,0.4)",
              hoverBorderColor: "rgba(255,99,132,1)"
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
    });

    var ctx = document.getElementById('myChartCompra').getContext('2d');
    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: labelsCompra_db,
          datasets: [{
              label: '',
              data: dataCompra_db,
              backgroundColor: [
                  'rgba(255,99,132,0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255,99,132,0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1,
              hoverBackgroundColor: "rgba(255,99,132,0.4)",
              hoverBorderColor: "rgba(255,99,132,1)"
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
    });
  var ctx = document.getElementById('myChartTotalVendido').getContext('2d');
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labelsTotalVendidoPorMes_db,
        datasets: [{
            label: '',
            data: dataTotalVendidoPorMes_db,
            backgroundColor: [
                'rgba(255,99,132,0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255,99,132,0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            hoverBackgroundColor: "rgba(255,99,132,0.4)",
            hoverBorderColor: "rgba(255,99,132,1)"
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
  });
</script>
<?php 
	include('../../footer.php');
?>
</body>
</html>
