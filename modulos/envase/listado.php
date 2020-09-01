<?php
require_once "../../class/Envase.php";

$listadoEnvase = Envase::obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Envase</title>
</head>
<body>
	<p align="center"><?php require_once"../../menu.php"; ?></p>
	<a href="alta.php"  role="button">Agregar</a>
	<table align="center" border="1 " width="50% ">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<?php foreach ($listadoEnvase as $envase): ?>
			<tbody align="center">
				<tr>
					<td><?php echo $envase->getNombre(); ?></td>
					<td>
						<a href="actualizar.php?id=<?php echo $envase->getIdEnvase(); ?>" role="button" title="Editar">Actualizar</a>
					</td>
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>
	<a href="../../menu.php"  role="button">Menu</a> 
</body>
</html>

