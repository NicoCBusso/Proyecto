<?php
require_once "../../class/Empleado.php";

$listadoEmpleados = Empleado::obtenerTodos();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Glou Glou</title>
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
                    <h2>Lista de Empleados <small></small></h2>
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
                            <div class="table-responsive">
                            <p class="text-muted font-13 m-b-30">
                              <a href="alta.php" role="button" class="btn btn-primary">Agregar</a>
                            </p>
                            <table class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr class="headings">                            
                                  <th class="column-title">Nombre</th>
                                  <th class="column-title">Apellido</th>
                                  <th class="column-title">DNI</th>
                                  <th class="column-title">Cargo</th>
                                  <th class="column-title">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($listadoEmpleados as $empleado): ?>
                                <tr class="even pointer">
                                  <td class=" "><?php echo $empleado->getNombre(); ?></td>
                                  <td class=" "><?php echo $empleado->getApellido(); ?></td>
                                  <td class=" "><?php echo $empleado->getDNI(); ?></td>
                                  <td class=" "><?php echo $empleado->cargo->getNombre();?></td>
                                  <td class=" last">
                                    <a href="actualizar.php?id=<?php echo $empleado->getEmpleado(); ?>" role="button" class="btn btn-primary" title="Editar">Actualizar</a>
                                      <a href="detalle.php?id=<?php echo $empleado->getEmpleado(); ?>" role="button" class="btn btn-success">Ver Detalle</a></a>
                                  </td>
                                </tr>
                                <?php endforeach ?>
                              </tbody>
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