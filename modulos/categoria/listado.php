<?php
require_once "../../class/Categoria.php";

$listadoCategoria = Categoria::obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Categorias</title>
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
		<?php foreach ($listadoCategoria as $categoria): ?>
			<tbody align="center">
				<tr>
					<td><?php echo $categoria->getNombre(); ?></td>
					<td>
						<a href="actualizar.php?id=<?php echo $categoria->getIdCategoria(); ?>" role="button" title="Editar">Actualizar</a>
						-
						<a href="../subcategoria/listado.php?id=<?php echo $categoria->getIdCategoria(); ?>" role ="button">Ver SubCategoria</a>
					</td>
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>
	<a href="../../menu.php"  role="button">Menu</a> 
</body>
</html>


