  <?php
require_once "../../class/Modulo.php";

$listadoModulo = Modulo::obtenerTodos();
//highlight_string(var_export($listadoPerfil,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Modulo</title>
</head>
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
                    <h2>Lista de Modulos <small></small></h2>
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
                          <th>Directorio</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <?php foreach ($listadoModulo as $modulos): ?>
                        <tbody>                       
                          <tr>
                            <td> <?php echo $modulos->getDescripcion(); ?> </td>
                            <td> <?php echo $modulos->getDirectorio(); ?> </td>
                            <td width="50%"> 
                              <a href="actualizar.php?id=<?php echo $modulos->getIdModulo(); ?>" role="button" title="Editar">Actualizar</a>
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
<body>
  <p align="center"><?php require_once"../../menu.php"; ?></p>
  <a href="alta.php"  role="button">Agregar</a>
  <table align="center" border="1 " width="50% ">
    <thead>
      <tr>
        <th align="center">Nombre</th>
        <th align="center">Directorio</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <?php foreach ($listadoModulo as $modulos): ?>
    <tbody align="center">                       
      <tr>
        <td> <?php echo $modulos->getDescripcion(); ?> </td>
        <td> <?php echo $modulos->getDirectorio(); ?> </td>
        <td width="50%"> 
          <a href="actualizar.php?id=<?php echo $modulos->getIdModulo(); ?>" role="button" title="Editar">Actualizar</a>
        </td>
      </tr> 
    </tbody>
    <?php endforeach ?>
  </table>
  <a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
*/?>