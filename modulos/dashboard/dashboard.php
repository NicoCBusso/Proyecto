<!DOCTYPE html>
<html>
<head>
  <script src="../../static/vendors/Chart.js/dist/Chart.min.js"></script>
	<title>Glou Glou</title>
</head>
<body>

  <?php 
    require_once "../../utils/graficosEstadisticos/consultas.php";
    $cantidadVentas = cantidadVendidasDelMes();
    $cantidadCompras = cantidadCompradasDelMes();
    $totalVendidoPorMes = totalVendidoPorMes();
    $cantidadVendidoEnElAño = totalVentasDelAño();
    $cantidadCompradoEnElAño = totalComprasDelAño();
    $productoMasVendidoDelMes = productoMasVendido();
    $tragoMasVendidoDelMes = tragoMasVendido();
    $puestoConMasSalida = puestoConMasSalida();
    $totalFacturadoAño = totalFacturadoDelAño();
    //echo $productoMasVendidoDelMes;
    //exit;    
  ?>

	<?php require_once "../../menu.php"; ?>

	<div class="right_col" role="main">
          <!-- top tiles -->
    <div class="row" style="display: inline-block;" >

            <div class="tile_count">
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total ventas del año</span>
                <div class="count">
                  <?php echo $cantidadVendidoEnElAño ?></div>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Total compras del año</span>
                <div class="count"><?php echo $cantidadCompradoEnElAño ?></div>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Producto con mas salida del mes</span>
                <div class="count"><?php echo $productoMasVendidoDelMes ?></div>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Trago con mas salida del mes</span>
                <div class="count"><h5><?php echo $tragoMasVendidoDelMes ?></h5></div>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Puesto con mas salidao</span>
                <div class="count"><h4><?php echo $puestoConMasSalida ?></h4></div>
              </div>
              <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Facturado en el año</span>
                <div class="count">$<?php echo intval($totalFacturadoAño) ?></div>
              </div>
            </div>
            <!-- /top tiles -->

          <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Top 10 cantidad de ventas del mes</h2>
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
                <h2>Top 10 cantidad de compras del mes</h2>
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
    //variables declaradas jiji

    var labelsVenta_db = [];
    var dataVenta_db = [];

    var labelsCompra_db = [];
    var dataCompra_db = [];

    var labelsTotalVendidoPorMes_db = [];
    var dataTotalVendidoPorMes_db = [];

    var colores = [];


    function generarNumero(numero){
      return (Math.random()*numero).toFixed(0);
    }

    function colorRGB(){
        var coolor = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
        return "rgb" + coolor;
    }

    <?php foreach ($cantidadVentas as $cantidadVendidas): ?>
      labelsVenta_db.push('<?php echo $cantidadVendidas['descripcion']; ?>');
      dataVenta_db.push('<?php echo $cantidadVendidas['cantidad']; ?>');
      colores.push(colorRGB());
    <?php endforeach; ?>

    <?php foreach ($cantidadCompras as $cantidadCompradas): ?>
      labelsCompra_db.push('<?php echo $cantidadCompradas['descripcion']; ?>');
      dataCompra_db.push('<?php echo $cantidadCompradas['cantidad']; ?>');
      colores.push(colorRGB());
    <?php endforeach; ?>

    <?php foreach ($totalVendidoPorMes as $totalVendido): ?>
      labelsTotalVendidoPorMes_db.push('<?php echo $totalVendido['mes']; ?>');
      dataTotalVendidoPorMes_db.push('<?php echo $totalVendido['total']; ?>');
      colores.push(colorRGB());
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
              backgroundColor: colores,
              borderColor: colores,
              borderWidth: 1
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
              backgroundColor: colores,
              borderColor: colores,
              borderWidth: 1
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
    type: 'doughnut',
    data: {
        labels: labelsTotalVendidoPorMes_db,
        datasets: [{
            label: '',
            data: dataTotalVendidoPorMes_db,
            backgroundColor: colores,
            borderColor: colores,
            borderWidth: 1
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
