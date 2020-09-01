<?php
require_once "../../class/ProductoTrago.php";
$idTrago = $_GET['id'];
$listadoIngrediente = ProductoTrago::obtenerPorIdTrago($idTrago);
//highlight_string(var_export($listadoIngrediente,true));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ingredientes de Trago</title>
</head>
<body>
	<p align="center"><?php require_once"../../menu.php"; ?></p>
	<a href="alta.php?id=<?php echo $idTrago; ?>"  role="button">Agregar</a>
	<table align="center" border="1 " width="50% ">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<?php foreach ($listadoIngrediente as $ingrediente): ?>
			<tbody align="center">
				<tr>
					<td><?php echo $ingrediente->producto->getNombre(); ?></td>
					<td> <?php echo $ingrediente->getCantidad(); ?> ml</td>
					<td>
						<a href="actualizar.php?id=<?php echo $ingrediente->getIdProductoTrago(); ?>&idTrago=<?php echo $idTrago;?>" role="button" title="Editar">Actualizar</a>
						<a href="procesar/delete.php?id=<?php echo $ingrediente->getIdProductoTrago(); ?>&idTrago=<?php echo $idTrago;?>" role="button" title="Editar">Eliminar</a>
					</td>					
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>
	<a href="../trago/listado.php"  role="button">Atras</a> 
</body>
</html>
