<?php
require_once "../../class/Solicitud.php";
$idSolicitud = $_GET['id'];
$solicitud = Solicitud::obtenerPorId($idSolicitud);
//highlight_string(var_export($solicitud,true));
//exit;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
  <title>Glou Glou!</title>
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
                    <h2>Solicitud <small></small></h2>
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
                          <a href="listado.php" role="button" class="btn btn-primary">Atras</a>
                          <button type="button" class="btn btn-success" onclick="actualizarSolicitud(2);">En proceso</button>
                          <button type="button" class="btn btn-success" onclick="actualizarSolicitud(3);">Entregado</button>
                        </p>
                          <table class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">                            
                                <th class="column-title">Nombre</th>
                                <th class="column-title">Cajero/a</th> 
                                <th class="column-title">Puesto</th> 
                                <th class="column-title">Estado</th>                          
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="even pointer">
                                <input type="hidden" id="idSolicitud" value="<?php echo $solicitud->getIdSolicitud();?>">
                                <td class=" "> <?php echo $solicitud->getIdSolicitud();?></td>
                                <td class=" "> <?php echo $solicitud->usuario->getNombre(); ?> </td>
                                <td class=" "> <?php echo $solicitud->puesto->getLugar(); ?>  </td> 
                                <td class=" "> <?php echo $solicitud->estado->getDescripcion(); ?></td>                                  
                              </tr>
                            </tbody>
                          </table>
                  </div>
                  </div>
              </div>
        </div>      
    </div>
    <div class="row">
                <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Detalle Solicitud <small></small></h2>
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
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">                            
                            <th class="column-title">ID</th>
                            <th class="column-title">Producto</th>
                            <th class="column-title">Cantidad</th>                          
                          </tr>
                        </thead>
                        <?php foreach ($solicitud->getArrDetalleSolicitud() as $detalleSolicitud): ?>                        
                          <tbody>
                            <tr class="even pointer">
                              <td class=" "><?php echo $detalleSolicitud->getIdDetalleSolicitud();?></td>
                              <td class=" "><?php echo $detalleSolicitud->producto->getNombre();?></td>
                              <td class=" "><?php echo $detalleSolicitud->getCantidad();?></td>
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
  </div>
</div>
</div>
</div>
</div>
  <script>
    function actualizarSolicitud($accion){
      let accion = $accion;
      let idSolicitud = $('#idSolicitud').val();
      if(idSolicitud >0){
        $.ajax({
          type: 'POST',
          url: 'procesar/update.php',
          data: {
            'accion': accion,
            'id': idSolicitud
          },
          success: function(data){
            console.log(data)
          }
        })
      } else {
        alert('Error Bro');
      }
      //location.reload();
    }
  </script>
  <?php require_once"../../footer.php"; ?>              
</body>
</html>