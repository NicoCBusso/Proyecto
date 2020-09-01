<?php
require_once "../../class/PersonaFisica.php";

$listadoPersonaFisica = PersonaFisica::obtenerTodos();
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

                  	<?php foreach ($listadoPersonaFisica as $personaFisica): ?>

                  	<tbody align="center">
                  
                      <tr>
							           <td> <?php echo $personaFisica->getDni(); ?> </td>
							           <td> <?php echo $personaFisica->getNombre(); ?> </td>
							           <td> <?php echo $personaFisica->getApellido(); ?> </td>
                         <td> <?php echo $personaFisica->getFechaNacimiento(); ?> </td>
							           <td width="50%"> 
								            <a href="actualizar.php?id=<?php echo $personaFisica->getPersonaFisica(); ?>" role="button" title="Editar">Actualizar</a>
                            <a href="detalle.php?id=<?php echo $personaFisica->getPersonaFisica(); ?>">Detalle</a>
								       </td>
			          </tr>
                    
                	</tbody>

                	<?php endforeach ?>

</table>
<a href="../../menu.php"  role="button">Menu</a>
</body>
</html>
