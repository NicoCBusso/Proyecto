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

<body>
  <p><?php require_once "../../menu.php"; ?></p>  
  <a href="alta.php"  role="button">Agregar</a>
  <table align="center" border="1 " width="50% ">
    <thead>
      <tr>
      <th>Razon Social</th>
      <th>Cuit</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <?php foreach ($listadoProveedor as $proveedor): ?>
    <tbody align="center">
      <tr>
        <td> <?php echo $proveedor->getRazonSocial(); ?> </td>
        <td> <?php echo $proveedor->getCuit(); ?> </td>
        <td width="50%"> 
          <a href="actualizar.php?id=<?php echo $proveedor->getIdProveedor(); ?>" role="button" title="Editar">Actualizar</a>
          <a href="detalle.php?id=<?php echo $proveedor->getIdProveedor(); ?>">Ver Detalle</a>
        </td>
      </tr>
    </tbody>
  <?php endforeach ?>
  </table>
  <a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>