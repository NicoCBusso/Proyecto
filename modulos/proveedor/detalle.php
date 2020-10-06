<?php
require_once '../../class/Proveedor.php';

$id = $_GET['id'];

$proveedor = Proveedor::obtenerPorId($id);
//highlight_string(var_export($proveedor,true));

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
                        <h2><i class="fa fa-bars"></i>  Detalle del Proveedor</h2>
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
                                   <span class="badge bg-green">ID:</span> <?php echo $proveedor->getIdProveedor();?>                            
                                <br>
                                    <span class="badge bg-green">Razon Social:</span> <?php echo $proveedor->getRazonSocial(); ?>
                                <br>
                                    <span class="badge bg-green">CUIT:</span> <?php echo $proveedor->getCuit();?>
                                <br>
                                </h5>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php if(is_null($proveedor->direccion)): ?>
                                    <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor" class="btn btn-primary"  >
                                    Agregar Domicilio
                                    </a>

                                <?php else:?>                          
                                    <h5>
                                    
                                        <span class="badge bg-green">Pais:</span> <?php echo $proveedor->direccion->localidad->provincia->pais->getDescripcion();?>
                                        <br>
                                        <span class="badge bg-green">Provincia:</span> <?php echo $proveedor->direccion->localidad->provincia->getDescripcion();?>
                                        <br>
                                        <span class="badge bg-green">Localidad:</span> <?php echo $proveedor->direccion->localidad->getDescripcion();?>
                                    <br>
                                        <span class="badge bg-green">Direccion:</span> <?php echo $proveedor->direccion;?>
                                    <br><br>
                                        <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $proveedor->direccion->getIdDireccion();?>&id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor" class="btn btn-primary">
                                            Modificar Domicilio
                                        </a>
                                    <br>
                                    </h5>
                                <?php endif ?>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                
                                    <a href="/programacion3/Proyecto/modulos/contacto/alta.php?id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor" class="btn btn-success">
                                    Agregar Contacto
                                    </a>
                                
                                <?php foreach ($proveedor->getArrContacto() as $contacto) : ?>
                                    <h5><span class="badge bg-green"><?php echo $contacto->tipoContacto->getDescripcion();?>:</span>  <span><?php echo $contacto; ?></h5>                                   
                                    <a href="/programacion3/Proyecto/modulos/contacto/actualizar.php?id_contacto=<?php echo $contacto->getIdContacto();?>&id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor" class="btn btn-primary">
                                        Modificar Contacto
                                    </a>
                                    <a href="/programacion3/Proyecto/modulos/contacto/procesar/delete.php?id_contacto=<?php echo $contacto->getIdContacto();?>&id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor" role="button" title="Editar" class="btn btn-danger">Eliminar</a>
                                
                                <?php endforeach ?>
                            </div>
                        </div>                                
                            
                            </div>                            
                        </div>
            </div>
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
                                <th>ID</th>
                                <th>Razon Social</th>
                                <th>CUIT</th>
                                <th>Direccion</th>
                                <th>Localidad</th>
                                <th>Provincia</th>
                                <th>Pais</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td> <?php echo $proveedor->getIdProveedor(); ?> </td>
                            <td> <?php echo $proveedor->getRazonSocial(); ?> </td>
                            <td> <?php echo $proveedor->getCuit(); ?> </td>
                            <td> <?php if(is_null($proveedor->direccion)): ?>
                                <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor">
                                Agregar Domicilio
                                </a>
                            <?php else:?>
                                <?php echo $proveedor->direccion; ?>
                                <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $proveedor->direccion->getIdDireccion(); ?>&id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor">
                                    Modificar Domicilio
                                </a>
                                <td><?php echo $proveedor->direccion->localidad->getDescripcion();?></td>
                                <td><?php echo $proveedor->direccion->localidad->provincia->getDescripcion();?></td>
                                <td><?php echo $proveedor->direccion->localidad->provincia->pais->getDescripcion();?></td>
                            <?php endif ?>
                          </tr>   
                        </tbody>
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
<!DOCTYPE html>
<html lang="es">

<body>
    <p><?php require_once "../../menu.php"; ?></p>  
    <table border="1" align="center">
    <thead>
     <tr>
        <th>ID</th>
        <th>Razon Social</th>
        <th>CUIT</th>
        <th>Direccion</th>
        <th>Localidad</th>
        <th>Provincia</th>
        <th>Pais</th>
     </tr>
    </thead>

    <tbody align="center">
      <tr>
        <td> <?php echo $proveedor->getIdProveedor(); ?> </td>
        <td> <?php echo $proveedor->getRazonSocial(); ?> </td>
        <td> <?php echo $proveedor->getCuit(); ?> </td>
        <td> <?php if(is_null($proveedor->direccion)): ?>
            <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor">
            Agregar Domicilio
            </a>

        <?php else:?>
            <?php echo $proveedor->direccion; ?>

            <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $proveedor->direccion->getIdDireccion(); ?>&id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor">
                Modificar Domicilio
            </a>
            <td><?php echo $proveedor->direccion->localidad->getDescripcion();?></td>
            <td><?php echo $proveedor->direccion->localidad->provincia->getDescripcion();?></td>
            <td><?php echo $proveedor->direccion->localidad->provincia->pais->getDescripcion();?></td>
        <?php endif ?>
      </tr>   

    </tbody>

</table>
<a href="listado.php">Volver al Listado</a>


</body>

</html>
*/?>