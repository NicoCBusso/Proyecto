<?php 

require_once '../../class/Trago.php';

$listadoTrago = Trago::obtenerTodos();
//highlight_string(var_export($listadoTrago,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Lista de Tragos</title>
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
                    <h2>Lista de Tragos <small></small></h2>
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
                          <th class="column-title">Precio Venta</th>
                          <th class="column-title">Acciones</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listadoTrago as $trago): ?>
                        <tr class="even pointer">
                          <td class=" "><?php echo $trago->getNombre();?></td>
                          <td class=" "><?php echo $trago->getPrecioVenta();?></td>
                          <td class=" last">
                            <a href="actualizar.php?id=<?php echo $trago->getIdTrago(); ?>" role="button" class="btn btn-primary" title="Editar">Actualizar</a>
                            <a href="detalle.php?id=<?php echo $trago->getIdTrago(); ?>" role="button" class="btn btn-success" title="Ver Detalle">Ver Detalle</a>
                            <a href="../productotrago/listado.php?id=<?php echo $trago->getIdTrago(); ?>" role="button" class="btn btn-warning" title="Ingredientes">Ingredientes</a>
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
  <table align="center" border="1 " width="60% ">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio Venta</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <?php foreach ($listadoTrago as $trago): ?>

      <tbody align="center">
        <tr>
          <td> <?php echo $trago->getNombre(); ?> </td>
          <td> <?php echo $trago->getPrecioVenta()?>$</td>
          <td width="50%"> 
            <a href="actualizar.php?id=<?php echo $trago->getIdTrago(); ?>" role="button" title="Editar">Actualizar</a>
            <a href="detalle.php?id=<?php echo $trago->getIdTrago(); ?>" role="button" title="Editar">Ver Detalle</a>
            <a href="../productotrago/listado.php?id=<?php echo $trago->getIdTrago(); ?>" role="button" title="Editar">Ingredientes</a>
          </td>
        </tr>
      </tbody>
    <?php endforeach ?>
  </table>

  <a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
*/?>