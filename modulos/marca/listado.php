<?php
require_once "../../class/Marca.php";

$listadoMarca = Marca::obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Marca</title>
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
		<?php foreach ($listadoMarca as $marca): ?>
			<tbody align="center">
				<tr>
					<td><?php echo $marca->getNombre(); ?></td>
					<td>
						<a href="actualizar.php?id=<?php echo $marca->getIdMarca(); ?>" role="button" title="Editar">Actualizar</a>
					</td>
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>
	<a href="../../menu.php"  role="button">Menu</a> 
</body>
</html>

