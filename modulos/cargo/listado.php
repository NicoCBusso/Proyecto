<?php
require_once "../../class/Cargo.php";

$listadoCargo = Cargo::obtenerTodos();
//highlight_string(var_export($listadoCargo,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Listado de Cargo</title>
</head>

<body>
  <p align="center"><?php require_once"../../menu.php"; ?></p>
  <a href="alta.php"  role="button">Agregar</a>
  <table align="center" border="1 " width="50% ">
    <thead>
      <tr>
        <th align="center">Nombre</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <?php foreach ($listadoCargo as $cargo): ?>
      <tbody align="center">              
        <tr>
          <td> <?php echo $cargo->getNombre(); ?> </td>
          <td width="50%"> 
            <a href="actualizar.php?id=<?php echo $cargo->getIdCargo(); ?>" role="button" title="Editar">Actualizar</a>
          </td>
        </tr> 
      </tbody>
    <?php endforeach ?>
  </table>
  <a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
