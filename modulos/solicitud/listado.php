<?php
require_once "../../class/Solicitud.php";

$listadoSolicitud = Solicitud::obtenerTodos();
//highlight_string(var_export($listadoSolicitud,true));
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
                    <h2>Lista de Solicitudes <small>Users</small></h2>
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
                      <a href="alta.php" role="button" class="btn btn-primary">Agregar</a>
                    </p>
                    <table id="datatable" class="table" style="width:100%">
                      <thead>
                      <tr>
                        <th>Nro</th>
                        <th>Jefe de Barman/a</th>
                        <th>Fecha y Hora Pedido</th>
                        <th>Fecha y Hora Entrega</th>              
                        <th>Estado</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <?php foreach ($listadoSolicitud as $solicitud): ?>
                        <tbody>
                          <tr>
                            <td><?php echo $solicitud->getIdSolicitud(); ?></td>
                            <td><?php echo $solicitud->usuario->getNombre(); ?></td>
                            <td><?php echo $solicitud->getFechaHoraPedido();?></td> 
                            <td><?php echo $solicitud->getFechaHoraEntrega();?></td>           
                            <td><?php echo $solicitud->estado->getDescripcion();?></td>
                            <td width="50%"> 

                            <a href="detalle.php?id=<?php echo $solicitud->getIdSolicitud(); ?>" role="button" title="Editar">Detalle</a>

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
</div>
</div>
    </div>
  </div>
  <?php require_once"../../footer.php"; ?>              
</body>
</html>