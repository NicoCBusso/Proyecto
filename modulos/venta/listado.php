<?php
require_once "../../class/Venta.php";

$listadoVentas = Venta::obtenerTodos();
//highlight_string(var_export($listadoVentas,true));
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Glou Glou!</title>
</head>
<html>

<body class="nav-md">
  <?php require_once"../../menu.php"; ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">

      <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Ventas <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
      </div>
    </div>
  <div class="x_content">
    <div class="row">
      <div class="col-sm-12">
        <div class="card-box table-responsive">
          <p class="text-muted font-13 m-b-30">
            <a href="alta.php" role="button" class="btn btn-primary">Agregar</a>
          </p>
          <table id="datatable" class="table" style="width:100%">
            <thead>
            <tr>
              <th>Nro</th>
              <th>Cajero/a</th>
              <th>Fecha Hora Emision</th>
              <th>Fecha Hora Expiracion</th>
              <th>Total</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <?php foreach ($listadoVentas as $venta): ?>
            <tbody>
              <tr>
                <td> <?php echo $venta->getIdVenta(); ?> </td>
                <td> <?php echo $venta->usuario->getNombre(); ?> </td>
                <td><?php echo $venta->getFechaHoraEmision();?></td>
                <td><?php echo $venta->getFechaHoraExpiracion();?></td>
                <td>$<?php echo $venta->getTotal();?></td>
                <td width="50%"> 

                <a href="detalle.php?id=<?php echo $venta->getIdVenta(); ?>" role="button" title="Editar">Detalle</a>

                </td>
              </tr>
            </tbody>
            <?php endforeach ?>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php require_once"../../footer.php"; ?>              
</body>
</html>