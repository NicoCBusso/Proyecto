<?php

require_once '../../class/Localidad.php';

$id = $_GET['id'];

$localidad = Localidad::obtenerPorId($id);


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
                    <h2>Detalle Localidad</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
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
                              <table id="datatable" class="table" style="width:100%">
                                <thead>
                                  <tr>
                                  	<th>ID</th>
                                    <th>Nombre</th>
                                    <th>Provincia</th>                           
                                  </tr>
                                </thead>                      
                                  <tbody>               
                                    <tr>
                                      <td><?php echo $localidad->getIdLocalidad(); ?></td>
                        							<td><?php echo $localidad->getDescripcion(); ?></td>
                        							<td><?php echo $localidad->provincia->getDescripcion(); ?></td>                          
                                    </tr>              
                                  </tbody>
                              </table>
                              <a href="listado.php" role="button" class="btn btn-primary">Atras</a>
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
