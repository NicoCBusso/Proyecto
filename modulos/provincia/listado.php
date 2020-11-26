<?php
require_once "../../class/Provincia.php";

$listadoProvincia = Provincia::obtenerTodos();

//highlight_string(var_export($listadoProvincia,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Listado de Provincias</title>
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
                    <h2>Lista de Provincias <small></small></h2>
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
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">                            
                          <th class="column-title">Nombre</th>
                          <th class="column-title">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listadoProvincia as $provincia): ?>
                        <tr class="even pointer">
                          <td class=" "><?php echo $provincia->getDescripcion(); ?></td>
                          <td class=" last">
                            <a href="actualizar.php?id=<?php echo $provincia->getIdProvincia(); ?>" role="button" class="btn btn-primary" title="Editar">Actualizar</a>
                            <a href="actualizar.php?id=<?php echo $provincia->getIdProvincia(); ?>" role="button" class="btn btn-primary" title="Editar">Detalle</a>
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
<?php /*
<body>
  <p align="center"><?php require_once"../../menu.php"; ?></p>
  <a href="alta.php"  role="button">Agregar</a>
  <table align="center" border="1 " width="50% ">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>

                  	<?php foreach ($listadoProvincia as $provincia): ?>

                  	<tbody align="center">
                  
                      <tr>
							           <td> <?php echo $provincia->getDescripcion(); ?> </td>
							           <td width="50%"> 
								            <a href="actualizar.php?id=<?php echo $provincia->getIdProvincia(); ?>" role="button" title="Editar">Actualizar</a>
                            <a href="detalleProvincia.php?id=<?php echo $provincia->getIdProvincia(); ?>">Detalle</a>                            
								         </td>
			                </tr>
                    
                	</tbody>

                	<?php endforeach ?>

                </table>
  <a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
*/?>