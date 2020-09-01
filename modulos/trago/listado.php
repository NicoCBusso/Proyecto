<?php 

require_once '../../class/Trago.php';

$listadoTrago = Trago::obtenerTodos();
//highlight_string(var_export($listadoTrago,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Lista de Tragos</title>
</head>

<body>
  <p align="center"><?php require_once"../../menu.php"; ?></p>
  <a href="alta.php"  role="button">Agregar</a>
  <table align="center" border="1 " width="60% ">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio Venta</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <?php foreach ($listadoTrago as $trago): ?>

      <tbody align="center">
        <tr>
          <td> <?php echo $trago->getNombre(); ?> </td>
          <td> <?php echo $trago->getPrecioVenta()?>$</td>
          <td width="50%"> 
            <a href="actualizar.php?id=<?php echo $trago->getIdTrago(); ?>" role="button" title="Editar">Actualizar</a>
            <a href="detalle.php?id=<?php echo $trago->getIdTrago(); ?>" role="button" title="Editar">Ver Detalle</a>
            <a href="../productotrago/listado.php?id=<?php echo $trago->getIdTrago(); ?>" role="button" title="Editar">Ingredientes</a>
          </td>
        </tr>
      </tbody>
    <?php endforeach ?>
  </table>

  <a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
