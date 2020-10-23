<?php
require_once "../../class/Salida.php";

$listadoSalida = Salida::obtenerTodos();
//highlight_string(var_export($listadoSalida,true));
//exit;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
                    <h2>Lista de Salidas <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                      <a href="alta.php" role="button" class="btn btn-primary">Agregar</a>
                    </p>
                    <table id="datatable" class="table" style="width:100%">
                      <thead>
                        <tr>
                          <th>Producto</th>
                          <th>Puesto</th>
                        </tr>
                      </thead>
                      <?php foreach ($listadoSalida as $salida): ?>
                        <tbody>              
	                        <tr>
            								<td>
                              <?php
                                if($salida->getIdDetalleVenta() == NULL){
                                  echo $salida->detalle->getNombre();
                                } else {
                                  echo $salida->detalle->productoFinal->getNombre();
                                }
                              ?>
                            </td>
                            <td><?php echo $salida->puesto->getLugar(); ?></td>            								
            							</tr>
                        </tbody>
                      <?php endforeach ?>
                    </table>
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