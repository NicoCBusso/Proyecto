<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$usuarioo = Usuario::obtenerPorId($id);
//highlight_string(var_export($usuarioo,true)); 
?>  

<!DOCTYPE html>
<html>
<head>
    <title>Detalle</title>
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
                    <h2>Detalle Usuario <small></small></h2>
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
                    <table id="datatable" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Nro. Documento</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Sexo</th>
                                <th>Estado</th>
                                <th>Avatar</th>
                                <th>Direccion</th>
                                <th>Localidad</th>
                                <th>Provincia</th>
                                <th>Pais</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td><?php echo $usuarioo->getIdUsuario();?></td>
                            <td><?php echo $usuarioo->getNombre(); ?></td>
                            <td><?php echo $usuarioo->getApellido();?></td>
                            <td><?php echo $usuarioo->getDni()?></td>
                            <td><?php echo $usuarioo->getFechaNacimiento()?></td>
                            <td><?php echo $usuarioo->getSexo()?></td>
                            <td><?php echo $usuarioo->getEstadoPersona()?></td>
                            <td><img src="../../img/usuarios/<?php echo $usuarioo->getAvatar();?>" width="30" height="30"></td>
                            <td><?php if(is_null($usuarioo->direccion)): ?>
                                <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario">
                                Agregar Domicilio
                                </a>

                            <?php else:?>
                                <?php echo $usuarioo->direccion; ?>
                                <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $usuarioo->direccion->getIdDireccion();?>&id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario">
                                    Modificar Domicilio
                                </a>
                            </td>
                            <td><?php echo $usuarioo->direccion->localidad->getDescripcion();?></td>
                            <td><?php echo $usuarioo->direccion->localidad->provincia->getDescripcion();?></td>
                            <td><?php echo $usuarioo->direccion->localidad->provincia->pais->getDescripcion();?></td>
                            <?php endif ?>
                        </tbody>
                    </table>
                    <a href="listado.php" role="button" class="btn btn-primary">Atras</a>
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
    <table border="1" align="center">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nro. Documento</th>
            <th>Fecha de Nacimiento</th>
            <th>Sexo</th>
            <th>Estado</th>
            <th>Direccion</th>
            <th>Localidad</th>
            <th>Provincia</th>
            <th>Pais</th>
        </thead>
        <tbody align="center">
            <td><?php echo $usuarioo->getIdUsuario();?></td>
            <td><?php echo $usuarioo->getNombre(); ?></td>
            <td><?php echo $usuarioo->getApellido();?></td>
            <td><?php echo $usuarioo->getDni()?></td>
            <td><?php echo $usuarioo->getFechaNacimiento()?></td>
            <td><?php echo $usuarioo->getSexo()?></td>
            <td><?php echo $usuarioo->getEstadoPersona()?></td>
            <td> <?php if(is_null($usuarioo->direccion)): ?>
                <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario">
                Agregar Domicilio
                </a>

            <?php else:?>
                <?php echo $usuarioo->direccion; ?>
                <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $usuarioo->direccion->getIdDireccion();?>&id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario">
                    Modificar Domicilio
                </a>
            </td>
            <td><?php echo $usuarioo->direccion->localidad->getDescripcion();?></td>
            <td><?php echo $usuarioo->direccion->localidad->provincia->getDescripcion();?></td>
            <td><?php echo $usuarioo->direccion->localidad->provincia->pais->getDescripcion();?></td>
            <?php endif ?>
        </tbody>
    </table>
    <p align="center"> <a href="listado.php">Volver al Listado</a></p>
</body>
</html>
*/ ?>