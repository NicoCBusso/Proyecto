<?php
require_once "../../class/Usuario.php";

$listadoUsuarios = Usuario::obtenerTodos();
//highlight_string(var_export($listadoUsuarios,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Usuario</title>
</head>

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
                    <h2>Lista de Usuarios <small></small></h2>
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
                          <th>Username</th>                          
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Perfil</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <?php foreach ($listadoUsuarios as $usuarioo): ?>
                        <tbody>                     
                          <tr>
                          <td> <?php echo $usuarioo->getUsername(); ?> </td>                    
                          <td> <?php echo $usuarioo->getNombre(); ?></td>
                          <td> <?php echo $usuarioo->getApellido(); ?></td>
                          <td><?php echo $usuarioo->perfil->getDescripcion(); ?></td>
                          <td width="50%"> 
                            <a href="actualizar.php?id=<?php echo $usuarioo->getIdUsuario(); ?>" role="button" title="Editar">Actualizar</a>
                            -
                            <a href="detalle.php?id=<?php echo $usuarioo->getIdUsuario(); ?>">Ver Detalle</a>
                          </td></tr>                       
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
  <?php include "../../menu.php"; ?>
  <a href="alta.php"  role="button">Agregar</a>
  <table align="center" border="1 " width="50% "><thead>
      <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Perfil</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <?php foreach ($listadoUsuarios as $usuarioo): ?>
      <tbody align="center">                     
        <tr>
        <td> <?php echo $usuarioo->getUsername(); ?> </td>
        <td> <?php echo $usuarioo->getPassword(); ?> </td>
        <td> <?php echo $usuarioo->getNombre(); ?></td>
        <td> <?php echo $usuarioo->getApellido(); ?></td>
        <td><?php echo $usuarioo->getApellido(); ?></td>
        <td width="50%"> 
          <a href="actualizar.php?id=<?php echo $usuarioo->getIdUsuario(); ?>" role="button" title="Editar">Actualizar</a>
          <a href="detalle.php?id=<?php echo $usuarioo->getIdUsuario(); ?>">Ver Detalle</a>
        </td></tr>                       
      </tbody>
    <?php endforeach ?>
  </table>
  <a href="../../menu.php"  role="button">Menu</a>
</body>
</html>
*/?>