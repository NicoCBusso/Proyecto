<?php
require_once "../../class/Compra.php";
$idCompra = $_GET['id'];
$compra = Compra::obtenerPorId($idCompra);
//highlight_string(var_export($listadoCompras,true));
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
                    <h2>Compra</h2>
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
                          <th class="column-title">Cajero/a</th> 
                          <th class="column-title">Total</th>                                                   
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="even pointer">
                          <td class=" "><?php echo $compra->getIdCompra();?></td>
                          <td class=" "><?php echo $compra->usuario->getNombre();?></td>
                          <td class=" "><?php echo $compra->getTotal();?>$</td>  
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
                      <h2>Detalle Compra <small></small></h2>
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
                                    <th class="column-title">Cantidad</th>                          
                                  </tr>
                                </thead>
                                <?php foreach ($compra->getArrDetalleCompra() as $detalleCompra): ?>
                                  <tbody>                                  
                                    <tr class="even pointer">
                                      <td class=" "><?php echo $detalleCompra->getIdDetalleCompra();?></td>
                                      <td class=" "><?php echo $detalleCompra->producto->getNombre();?></td>
                                      <td class=" ">$<?php echo $detalleCompra->getPrecio();?></td> 
                                      <td class=" "><?php echo $detalleCompra->getCantidad();?></td>
                                    </tr>
                                  </tbody>
                                <?php endforeach ?>
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
</div>
</div>
</div>
  <?php require_once"../../footer.php"; ?>              
</body>
</html>