<?php
require_once "../../class/Empleado.php";

$listadoEmpleados = Empleado::obtenerTodos();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Empleados</title>
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

                  	<?php foreach ($listadoEmpleados as $empleado): ?>

                  	<tbody align="center">
                  
                      <tr>
							           <td> <?php echo $empleado->getDni(); ?> </td>
							           <td> <?php echo $empleado->getNombre(); ?> </td>
							           <td> <?php echo $empleado->getApellido(); ?> </td>
                         			   <td> <?php echo $empleado->getFechaNacimiento(); ?> </td>
							           <td width="50%"> 
								            <a href="actualizar.php?id=<?php echo $empleado->getEmpleado(); ?>" role="button" title="Editar">actualizar</a>
								       </td>
			          </tr>
                    
                	</tbody>

                	<?php endforeach ?>

                </table>
</body>
</html>
