<?php

require_once '../../class/Empleado.php';

$id = $_GET['id'];

$empleado = Empleado::obtenerPorId($id);
//highlight_string(var_export($empleado,true));
//exit;
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
                                <h5>                                
                                   <span class="badge bg-green">ID:</span> <?php echo $empleado->getEmpleado();?>                            
                                <br>
                                    <span class="badge bg-green">Nombre:</span> <?php echo $empleado->getNombre(); ?>
                                <br>
                                    <span class="badge bg-green">Apellido:</span> <?php echo $empleado->getApellido();?>
                                <br>
                                    <span class="badge bg-green">Nro. Documento:</span> <?php echo $empleado->getDni()?>
                                <br>
                                    <span class="badge bg-green">Fecha de Nacimiento:</span> <?php echo $empleado->getFechaNacimiento()?>
                                <br>
                                    <span class="badge bg-green">Sexo:</span> <?php echo $empleado->getSexo()?>
                                <br>                                
                                    <span class="badge bg-green">Cargo:</span> <?php echo $empleado->cargo->getNombre();?>
                                <br>                                
                                    <span class="badge bg-green">Estado:</span> <?php echo $empleado->getEstadoPersona()?>
                                <br>
                                </h5>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php if(is_null($empleado->direccion)): ?>
                                    <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getEmpleado(); ?>&modulo=empleado" class="btn btn-primary"  >
                                    Agregar Domicilio
                                    </a>

                                <?php else:?>                          
                                    <h5>
                                    
                                        <span class="badge bg-green">Pais:</span> <?php echo $empleado->direccion->localidad->provincia->pais->getDescripcion();?>
                                        <br>
                                        <span class="badge bg-green">Provincia:</span> <?php echo $empleado->direccion->localidad->provincia->getDescripcion();?>
                                        <br>
                                        <span class="badge bg-green">Localidad:</span> <?php echo $empleado->direccion->localidad->getDescripcion();?>
                                    <br>
                                        <span class="badge bg-green">Direccion:</span> <?php echo $empleado->direccion;?>
                                    <br><br>
                                        <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $empleado->direccion->getIdDireccion();?>&id_persona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getEmpleado(); ?>&modulo=empleado" class="btn btn-primary">
                                            Modificar Domicilio
                                        </a>
                                    <br>
                                    </h5>
                                <?php endif ?>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                
                                    <a href="/programacion3/Proyecto/modulos/contacto/alta.php?id_persona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getEmpleado(); ?>&modulo=empleado" class="btn btn-success">
                                    Agregar Contacto
                                    </a>
                                
                                <?php foreach ($empleado->getArrContacto() as $contacto) : ?>
                                    <h5><span class="badge bg-green"><?php echo $contacto->tipoContacto->getDescripcion();?>:</span>  <span><?php echo $contacto; ?></h5>                                   
                                    <a href="/programacion3/Proyecto/modulos/contacto/actualizar.php?id_contacto=<?php echo $contacto->getIdContacto();?>&id_persona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getEmpleado(); ?>&modulo=empleado" class="btn btn-primary">
                                        Modificar Contacto
                                    </a>
                                    <a href="/programacion3/Proyecto/modulos/contacto/procesar/delete.php?id_contacto=<?php echo $contacto->getIdContacto();?>&id_persona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getEmpleado(); ?>&modulo=empleado" role="button" title="Editar" class="btn btn-danger">Eliminar</a>
                                
                                <?php endforeach ?>
                            </div>
                        </div>                                
                            
                            </div>                            
                        </div>
            </div>
            <div class="col-md-12 col-sm-12 ">

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detalle Empleado <small></small></h2>
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
                                <th>Cargo</th>
                                <th>Direccion</th>
                                <th>Localidad</th>
                                <th>Provincia</th>
                                <th>Pais</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td><?php echo $empleado->getEmpleado();?></td>
                            <td><?php echo $empleado->getNombre(); ?></td>
                            <td><?php echo $empleado->getApellido();?></td>
                            <td><?php echo $empleado->getDni()?></td>
                            <td><?php echo $empleado->getFechaNacimiento()?></td>
                            <td><?php echo $empleado->getSexo()?></td>
                            <td><?php echo $empleado->getEstadoPersona()?></td>
                            <td><?php echo $empleado->cargo->getNombre();?></td>
                            <td> <?php if(is_null($empleado->direccion)): ?>
                                <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getEmpleado(); ?>&modulo=empleado">
                                Agregar Domicilio
                                </a>

                            <?php else:?>
                                <?php echo $empleado->direccion; ?>
                                <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $empleado->direccion->getIdDireccion();?>&id_persona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getEmpleado(); ?>&modulo=empleado">
                                    Modificar Domicilio
                                </a>
                                <td><?php echo $empleado->direccion->localidad->getDescripcion();?></td>
                                <td><?php echo $empleado->direccion->localidad->provincia->getDescripcion();?></td>
                                <td><?php echo $empleado->direccion->localidad->provincia->pais->getDescripcion();?></td>
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
</div>
</div>

  <?php require_once"../../footer.php"; ?>              
</body>
</html>  
<?php /*
<!DOCTYPE html>
<html>
<head>
    <title>Detalle</title>
</head>
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
            <th>Cargo</th>
            <th>Direccion</th>
            <th>Localidad</th>
            <th>Provincia</th>
            <th>Pais</th>
        </thead>
        <tbody align="center">
            <td><?php echo $empleado->getEmpleado();?></td>
            <td><?php echo $empleado->getNombre(); ?></td>
            <td><?php echo $empleado->getApellido();?></td>
            <td><?php echo $empleado->getDni()?></td>
            <td><?php echo $empleado->getFechaNacimiento()?></td>
            <td><?php echo $empleado->getSexo()?></td>
            <td><?php echo $empleado->getEstadoPersona()?></td>
            <td><?php echo $empleado->cargo->getNombre();?></td>
            <td> <?php if(is_null($empleado->direccion)): ?>
                <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getEmpleado(); ?>&modulo=empleado">
                Agregar Domicilio
                </a>

            <?php else:?>
                <?php echo $empleado->direccion; ?>
                <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $empleado->direccion->getIdDireccion();?>&id_persona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getEmpleado(); ?>&modulo=empleado">
                    Modificar Domicilio
                </a>
                <td><?php echo $empleado->direccion->localidad->getDescripcion();?></td>
                <td><?php echo $empleado->direccion->localidad->provincia->getDescripcion();?></td>
                <td><?php echo $empleado->direccion->localidad->provincia->pais->getDescripcion();?></td>
            <?php endif ?>
        </tbody>
    </table>
    <p align="center"> <a href="listado.php">Volver al Listado</a></p>
</body>
</html>
*/?>