<?php
require_once "../../class/Venta.php";
$idVenta = $_GET['id'];
$venta = Venta::obtenerPorId($idVenta);
const SIN_CONSUMIR = 1;
const CONSUMIDO = 2;
const ANULADO = 3;
//highlight_string(var_export($venta,true));
//exit;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
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
                    <h2>Venta <small></small></h2>
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
                        </p>
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">                            
                              <th class="column-title">ID</th>
                              <th class="column-title">Cajero/a</th>
                              <th class="column-title">Total</th>                          
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="even pointer">
                              <td class=" "><?php echo $venta->getIdVenta();?></td>
                              <td class=" "><?php echo $venta->usuario->getNombre();?></td>
                              <td class=" ">$<?php echo $venta->obtenerTotal();?></td>                              
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
                      <h2>Detalle Venta <small></small></h2>
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
                                    <th class="column-title">Precio</th>
                                    <th class="column-title">Estado</th>                              
                                  </tr>
                                </thead>
                                <?php foreach($venta->getArrDetalleVenta() as $detalleVenta) :?>
                                  <tbody>
                                    <tr class="even pointer">
                                      <tr class="even pointer">
                                        <td class=" "><?php echo $detalleVenta->getIdDetalleVenta();?></td>
                                        <td class=" "><?php echo $detalleVenta->productoFinal->getNombre();?></td>
                                        <td class=" ">$<?php echo $detalleVenta->getPrecio();?></td> 
                                        <td class=" ">
                                          <?php
                                          if($detalleVenta->getEstado() == SIN_CONSUMIR){
                                           echo "Sin Consumir";
                                          }
                                          elseif ($detalleVenta->getEstado() == CONSUMIDO) {
                                            echo "Consumido";
                                          } elseif ($detalleVenta->getEstado() == ANULADO) {
                                            echo "Anulado";
                                          }
                                           ?></td>
                                      </tr>
                                  </tbody>
                                <?php endforeach ?>
                              </table>
                      </div>
                    </div>
                </div>
      </div>
  </div>
</div></div></div></div></div></div>
  <?php require_once"../../footer.php"; ?>              
</body>
</html>