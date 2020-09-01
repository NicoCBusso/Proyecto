<?php
require_once "../../class/Usuario.php";

$listadoUsuarios = Usuario::obtenerNoUsuarios();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Personas</title>
</head>

<body>
<a href="alta.php"  role="button">Agregar</a>
<table align="center" border="1 " width="50% ">
                  <thead>
                    <tr>
                      <th>DNI</th>
						          <th>Nombre</th>
						          <th>Apellido</th>
						          <th>Fecha Nacimiento</th>
						          <th>Acciones</th>
                    </tr>
                  </thead>

                  	<?php foreach ($listadoUsuarios as $usuario): ?>

                  	<tbody align="center">
                  
                      <tr>
							           <td> <?php echo $usuario->getDni(); ?> </td>
							           <td> <?php echo $usuario->getNombre(); ?> </td>
							           <td> <?php echo $usuario->getApellido(); ?> </td>
                         <td> <?php echo $usuario->getFechaNacimiento(); ?> </td>
							           <td width="50%"> 
								            <a href="alta.php?id=<?php echo $usuario->getPersonaFisica(); ?>" role="button" title="Editar">Registrar</a>
								       </td>
			          </tr>
                    
                	</tbody>

                	<?php endforeach ?>

                </table>
</body>
</html>
