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
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      <a href="alta.php" role="button" class="btn btn-primary">Agregar</a>
                    </p>
                    <table id="datatable" class="table" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>DNI</th>
                          <th>Cargo</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <?php foreach ($listadoEmpleados as $empleado): ?>
                        <tbody>
                          <tr>
                            <td> <?php echo $empleado->getDni(); ?> </td>
                            <td> <?php echo $empleado->getNombre(); ?> </td>
                            <td> <?php echo $empleado->getApellido(); ?> </td>
                            <td><?php echo $empleado->cargo->getNombre();?></td>
                            <td width="50%"> 
                              <a href="actualizar.php?id=<?php echo $empleado->getEmpleado(); ?>" role="button" title="Editar">Actualizar</a>
                              -
                              <a href="detalle.php?id=<?php echo $empleado->getEmpleado(); ?>">Ver Detalle</a>
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

  <?php require_once"../../footer.php"; ?>              
</body>
</html>

<?php /*
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Empleados</title>
</head>

<body>
<p align="center"><?php require_once"../../menu.php"; ?></p>
<a href="alta.php"  role="button">Agregar</a>
<table align="center" border="1 " width="50% ">
                  <thead>
                    <tr>
                      			  <th>DNI</th>
						          <th>Nombre</th>
						          <th>Apellido</th>
                      <th>Cargo</th>
						          <th>Acciones</th>
                    </tr>
                  </thead>

                  	<?php foreach ($listadoEmpleados as $empleado): ?>

                  	<tbody align="center">
                  
                      <tr>
							           <td> <?php echo $empleado->getDni(); ?> </td>
							           <td> <?php echo $empleado->getNombre(); ?> </td>
							           <td> <?php echo $empleado->getApellido(); ?> </td>
                         <td><?php echo $empleado->cargo->getNombre();?></td>
							           <td width="50%"> 
								            <a href="actualizar.php?id=<?php echo $empleado->getEmpleado(); ?>" role="button" title="Editar">Actualizar</a>
                            <a href="detalle.php?id=<?php echo $empleado->getEmpleado(); ?>">Ver Detalle</a>
								       </td>
			          </tr>
                    
                	</tbody>

                	<?php endforeach ?>

                </table>
<a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
*/?>
