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
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i>  Detalle del Empleado</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Direccion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Contacto</a>
                            </li>                            
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h5><span class="badge bg-green">Avatar:</span></h5>
                                   <img src="../../img/usuarios/<?php echo $usuarioo->getAvatar();?>" width="60" height="60">
                                   <h5><span class="badge bg-green">ID:</span></h5><h4><?php echo $usuarioo->getIdUsuario();?></h4>
                                    <h5><span class="badge bg-green">Nombre:</span></h5><h4><?php echo $usuarioo->getNombre(); ?></h4>
                                    <h5><span class="badge bg-green">Apellido:</span></h5><h4><?php echo $usuarioo->getApellido();?></h4>
                                    <h5><span class="badge bg-green">Nro. Documento:</span></h5><h4><?php echo $usuarioo->getDni()?></h4>
                                    <h5><span class="badge bg-green">Fecha de Nacimiento:</span></h5><h4><?php echo $usuarioo->getFechaNacimiento()?></h4>
                                    <h5><span class="badge bg-green">Sexo:</span></h5><h4><?php
                                    if($usuarioo->getSexo() == 1){
                                        echo "Masculino";
                                    } else if ($usuarioo->getSexo() == 2){
                                        echo "Femenino";
                                    }?>
                                     </h4>
                                    <h5><span class="badge bg-green">Estado:</span></h5><h4><?php 
                                    if($usuarioo->getEstadoPersona() == 1){
                                        echo "Activo";
                                    } else if ($usuarioo->getEstadoPersona() == 2){
                                        echo "De baja";
                                    }?>                                        
                                    </h4>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php if(is_null($usuarioo->direccion)): ?>
                                    <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario" class="btn btn-primary"  >
                                    Agregar Domicilio
                                    </a>
                                <?php else:?> 
                                    <h5><span class="badge bg-green">Pais:</span></h5><h4><?php echo $usuarioo->direccion->localidad->provincia->pais->getDescripcion();?></h4>
                                    <h5><span class="badge bg-green">Provincia:</span></h5><h4><?php echo $usuarioo->direccion->localidad->provincia->getDescripcion();?></h4>
                                    <h5><span class="badge bg-green">Localidad:</span></h5><h4><?php echo $usuarioo->direccion->localidad->getDescripcion();?></h4>
                                    <h5><span class="badge bg-green">Direccion:</span></h5><h4><?php echo $usuarioo->direccion;?><br></h4>
                                    <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $usuarioo->direccion->getIdDireccion();?>&id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario" class="btn btn-success">
                                        Modificar Domicilio
                                    </a></h4>
                                    <br>
                                <?php endif ?>                                
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                
                                    <a href="/programacion3/Proyecto/modulos/contacto/alta.php?id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario" class="btn btn-success">
                                    Agregar Contacto
                                    </a>
                                
                                <?php foreach ($usuarioo->getArrContacto() as $contacto) : ?>
                                    <h5><span class="badge bg-green"><?php echo $contacto->tipoContacto->getDescripcion();?>:</span></h5><h4><?php echo $contacto; ?></h4>
                                    <br>                                   
                                    <a href="/programacion3/Proyecto/modulos/contacto/actualizar.php?id_contacto=<?php echo $contacto->getIdContacto();?>&id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario" class="btn btn-primary">
                                        Modificar Contacto
                                    </a>
                                    <a href="/programacion3/Proyecto/modulos/contacto/procesar/delete.php?id_contacto=<?php echo $contacto->getIdContacto();?>&id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario" role="button" title="Editar" class="btn btn-danger">Eliminar</a>
                                
                                <?php endforeach ?>
                            </div>                        
                        </div>
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