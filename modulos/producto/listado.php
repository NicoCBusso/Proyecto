<?php
require_once "../../class/Producto.php";

$listadoProducto = Producto::obtenerTodos();
//highlight_string(var_export($listadoProducto,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Productos</title>
</head>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

  <body class="nav-md">
  <?php require_once"../../menu.php"; ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Productos <small>Users</small></h2>
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
                          <th>Nombre</th>
                          <th>Codigo de Barra</th>
                          <th>Contenido</th>
                          <th>Precio Compra</th>
                          <th>Precio Venta</th>
                          <th>Categoria</th>
                          <th>Sub Categoria</th>
                          <th>Envase</th>
                          <th>Marca</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <?php foreach ($listadoProducto as $producto): ?>

                        <tbody>
                          <tr>
                            <td> <?php echo $producto->getNombre(); ?> </td>
                            <td> <?php echo $producto->getCodigoBarra(); ?> </td>
                            <td> <?php echo $producto->getContenido(); ?> ml </td>
                            <td> <?php echo $producto->getPrecioCompra(); ?>$ </td>
                            <td> <?php echo $producto->getPrecioVenta(); ?>$ </td>
                            <td> <?php echo $producto->subcategoria->categoria->getNombre(); ?> </td>
                            <td> <?php echo $producto->subcategoria->getNombre(); ?> </td>
                            <td> <?php echo $producto->envase->getNombre(); ?> </td>
                            <td> <?php echo $producto->marca->getNombre(); ?> </td>
                            <td width="50%"> 
                              <a href="actualizar.php?id=<?php echo $producto->getIdProducto(); ?>" role="button" title="Editar">Actualizar</a>
                            </td>
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

  <?php require_once"../../footer.php"; ?>              
</body>
</html>







<?php /*

<body>
  <p align="center"><?php require_once"../../menu.php"; ?></p>
  <a href="alta.php"  role="button">Agregar</a>
  <table align="center" border="1 " width="60% ">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Codigo de Barra</th>
        <th>Contenido</th>
        <th>Precio Compra</th>
        <th>Precio Venta</th>
        <th>Categoria</th>
        <th>Sub Categoria</th>
        <th>Envase</th>
        <th>Marca</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <?php foreach ($listadoProducto as $producto): ?>

      <tbody align="center">
        <tr>
          <td> <?php echo $producto->getNombre(); ?> </td>
          <td> <?php echo $producto->getCodigoBarra(); ?> </td>
          <td> <?php echo $producto->getContenido(); ?> ml </td>
          <td> <?php echo $producto->getPrecioCompra(); ?>$ </td>
          <td> <?php echo $producto->getPrecioVenta(); ?>$ </td>
          <td> <?php echo $producto->subcategoria->categoria->getNombre(); ?> </td>
          <td> <?php echo $producto->subcategoria->getNombre(); ?> </td>
          <td> <?php echo $producto->envase->getNombre(); ?> </td>
          <td> <?php echo $producto->marca->getNombre(); ?> </td>
          <td width="50%"> 
            <a href="actualizar.php?id=<?php echo $producto->getIdProducto(); ?>" role="button" title="Editar">Actualizar</a>
          </td>
        </tr>
      </tbody>
    <?php endforeach ?>
  </table>

  <a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
*/?>