<?php

require_once "../../class/MySQL.php";


//highlight_string(var_export($listadoPerfil,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Glou Glou!</title>
</head>
<body class="nav-md">
  <?php require_once"../../menu.php"; ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Informes <small></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                          <a href="ventaFiltros.php" role="button" class="btn btn-primary">Detalles de ventas con estados</a>
                          <a href="ventaCantidad.php" role="button" class="btn btn-primary">Ventas por Fechas</a>
                          <a href="compra.php" role="button" class="btn btn-danger">Compra</a>
                          <a href="excepcion.php" role="button" class="btn btn-success">Excepciones</a>
                        </p>
                      </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
</div>
</div>
</div>

  <?php require_once"../../footer.php"; ?>              
</body>
</html>