<?php
require_once '../../class/Provincia.php';

$id = $_GET['id'];

$provincia = Provincia::obtenerPorId($id);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Detalle Provincia</title>
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
                    <h2>Detalle de Provincia <small></small></h2>
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
                      <a href="alta.php" role="button" class="btn btn-primary">Agregar</a>
                    </p>
                    <table id="datatable" class="table" style="width:100%">
                      <thead>
                        <tr>
                        	<th>ID</th>
							<th>Provincia</th>
							<th>Pais</th>
                        </tr>
                      </thead>
                        <tbody>                       
                          <tr>
                            <td><?php echo $provincia->getIdProvincia(); ?></td>
							<td><?php echo $provincia->getDescripcion(); ?></td>
							<td><?php echo $provincia->pais->getDescripcion(); ?></td>
                          </tr> 
                        </tbody>
                    </table>
                    <a href="listado.php"  class="btn btn-primary" role="button">Atras</a>
                  </div>
                  </div>
              </div>
            </div>

    </div>
  </div>

  <?php require_once"../../footer.php"; ?>              
</body>
</html>

