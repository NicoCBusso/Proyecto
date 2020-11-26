<?php
require_once "../../class/Excepcion.php";

$listadoExcepcion = Excepcion::obtenerTodos();
//highlight_string(var_export($listadoExcepcion,true));
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
                    <h2>Lista de Excepcion</h2>
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
                    <p class="text-muted font-13 m-b-30">
                      <a href="cambioCaja.php" role="button" class="btn btn-primary">Cambio Caja</a>
                      <a href="rotura.php" role="button" class="btn btn-danger">Rotura</a>
                      <a href="cambioBarra.php" role="button" class="btn btn-success">Cambio Barra</a>
                    </p>
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">                            
                          <th class="column-title">Tipo de Excepcion</th>
                          <th class="column-title">Consumicion a cambiar</th>
                          <th class="column-title">Consumicion cambiada</th>
                          <th class="column-title">Fecha y Hora generada</th>
                          <th class="column-title">Puesto</th>                         
                        </tr>
                      </thead>
                      <?php foreach ($listadoExcepcion as $excepcion): ?>
                      <tbody>                        
                        <tr class="even pointer">
                          <td class="even pointer"><?php echo $excepcion->tipoExcepcion->getDescripcion();?></td>                            
                            <td class="even pointer"><?php echo $excepcion->consumicionACambiar->getNombre(); ?></td>
                            <td class="even pointer"><?php echo $excepcion->consumicionCambiada->getNombre(); ?></td>
                            <td class="even pointer"><?php echo $excepcion->getFechaHora();?></td>
                            <td class="even pointer"><?php echo $excepcion->puesto->getLugar(); ?></td> 
                          
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