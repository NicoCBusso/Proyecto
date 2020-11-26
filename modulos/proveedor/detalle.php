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
                                <h5><span class="badge bg-green">ID:</span></h5><h4><?php echo $proveedor->getIdProveedor();?></h4>
                                <h5><span class="badge bg-green">Razon Social:</span></h5><h4><?php echo $proveedor->getRazonSocial(); ?></h4>
                                <h5><span class="badge bg-green">CUIT:</span></h5><h4><?php echo $proveedor->getCuit();?></h4>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php if(is_null($proveedor->direccion)): ?>
                                    <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor" class="btn btn-primary"  >
                                    Agregar Domicilio
                                    </a>

                                <?php else:?>                          
                                    <h5><span class="badge bg-green">Pais:</span></h5><h4><?php echo $proveedor->direccion->localidad->provincia->pais->getDescripcion();?></h4>
                                    <h5><span class="badge bg-green">Provincia:</span></h5><h4><?php echo $proveedor->direccion->localidad->provincia->getDescripcion();?></h4>
                                    <h5><span class="badge bg-green">Localidad:</span></h5><h4><?php echo $proveedor->direccion->localidad->getDescripcion();?></h4>
                                    <h5><span class="badge bg-green">Direccion:</span></h5><h4><?php echo $proveedor->direccion;?></h4>
                                    <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $proveedor->direccion->getIdDireccion();?>&id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor" class="btn btn-primary">
                                        Modificar Domicilio
                                    </a>
                                    </h5>
                                <?php endif ?>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                
                                    <a href="/programacion3/Proyecto/modulos/contacto/alta.php?id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor" class="btn btn-success">
                                    Agregar Contacto
                                    </a>
                                
                                <?php foreach ($proveedor->getArrContacto() as $contacto) : ?>
                                    <h5><span class="badge bg-green"><?php echo $contacto->tipoContacto->getDescripcion();?>:</span></h5><h4><?php echo $contacto; ?></h4>                                   
                                    <a href="/programacion3/Proyecto/modulos/contacto/actualizar.php?id_contacto=<?php echo $contacto->getIdContacto();?>&id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor" class="btn btn-primary">
                                        Modificar Contacto
                                    </a>
                                    <a href="/programacion3/Proyecto/modulos/contacto/procesar/delete.php?id_contacto=<?php echo $contacto->getIdContacto();?>&id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor" role="button" title="Editar" class="btn btn-danger">Eliminar</a>
                                
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
  </div>

  <?php require_once"../../footer.php"; ?>              
</body>
</html>