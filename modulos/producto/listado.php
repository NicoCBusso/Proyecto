<?php
require_once "../../class/Producto.php";

$listadoProducto = Producto::obtenerTodos();
//highlight_string(var_export($listadoProducto,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Proveedor</title>
</head>

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