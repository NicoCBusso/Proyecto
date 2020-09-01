<?php
require_once "../../class/Localidad.php";

$listadoLocalidad = Localidad::obtenerTodos();
//highlight_string(var_export($listadoPais,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Localidad</title>
</head>

<body>
  <p align="center"><?php require_once"../../menu.php"; ?></p>  
  <a href="alta.php"  role="button">Agregar</a>
  <table align="center" border="1 " width="50% ">
    <thead>
      <tr>
      <th>Nombre</th>
      <th>Provincia</th>
      <th>Opciones</th>
    </tr>
    </thead>
    <?php foreach ($listadoLocalidad as $localidad): ?>
      <tbody align="center">               
        <tr>
          <td> <?php echo $localidad->getDescripcion(); ?> </td>
          <td> <?php echo $localidad->provincia->getDescripcion();?></td>
          <td width="50%"> 
            <a href="actualizar.php?id=<?php echo $localidad->getIdLocalidad(); ?>" role="button" title="Editar">Actualizar</a>
            <a href="detalleLocalidad.php?id=<?php echo $localidad->getIdLocalidad(); ?>" role="button" title="Editar">Detalle</a>
          </td>
        </tr>              
        <?php endforeach ?>
      </tbody>
  </table>
  
  <a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
