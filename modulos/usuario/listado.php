<?php
require_once "../../class/Usuario.php";

$listadoUsuarios = Usuario::obtenerTodos();
//highlight_string(var_export($listadoUsuarios,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Usuario</title>
</head>

<body>
  <p align="center"><?php require_once"../../menu.php"; ?></p>
  <a href="alta.php"  role="button">Agregar</a>
  <table align="center" border="1 " width="50% "><thead>
      <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Perfil</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <?php foreach ($listadoUsuarios as $usuarioo): ?>
      <tbody align="center">                     
        <tr>
        <td> <?php echo $usuarioo->getUsername(); ?> </td>
        <td> <?php echo $usuarioo->getPassword(); ?> </td>
        <td> <?php echo $usuarioo->getNombre(); ?></td>
        <td> <?php echo $usuarioo->getApellido(); ?></td>
        <td><?php echo $usuarioo->getApellido(); ?></td>
        <td width="50%"> 
          <a href="actualizar.php?id=<?php echo $usuarioo->getIdUsuario(); ?>" role="button" title="Editar">Actualizar</a>
          <a href="detalle.php?id=<?php echo $usuarioo->getIdUsuario(); ?>">Ver Detalle</a>
        </td></tr>                       
      </tbody>
    <?php endforeach ?>
  </table>
  <a href="../../menu.php"  role="button">Menu</a>
</body>
</html>
