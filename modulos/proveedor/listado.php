<?php
require_once "../../class/Proveedor.php";

$listadoProveedor = Proveedor::obtenerTodos();
//highlight_string(var_export($listadoProveedor,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Proveedor</title>
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
                    <h2>Lista de Proveedores <small></small></h2>
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
                            <div class="table-responsive">
                            <p class="text-muted font-13 m-b-30">
                              <a href="alta.php" role="button" class="btn btn-primary">Agregar</a>
                            </p>
                            <table class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr class="headings">                            
                                  <th class="column-title">Razon Social</th>
                                  <th class="column-title">Cuit</th>
                                  <th class="column-title">Acciones</th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php foreach ($listadoProveedor as $proveedor): ?>
                                <tr class="even pointer">
                                  <td class=" "><?php echo $proveedor->getRazonSocial(); ?></td>
                                  <td class=" "><?php echo $proveedor->getCuit(); ?></td>
                                  <td class=" last">
                                    <a href="actualizar.php?id=<?php echo $proveedor->getIdProveedor(); ?>" role="button" class="btn btn-primary" title="Editar">Actualizar</a>
                                      <a href="detalle.php?id=<?php echo $proveedor->getIdProveedor(); ?>" role="button" class="btn btn-success">Ver Detalle</a></a>
                                  </td>
                                </tr>
                                <?php endforeach ?>
                              </tbody>
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

  <?php require_once"../../footer.php"; ?>              
</body>
</html>