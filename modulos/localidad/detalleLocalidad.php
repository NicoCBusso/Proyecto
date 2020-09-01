<?php

require_once '../../class/Localidad.php';

$id = $_GET['id'];

$localidad = Localidad::obtenerPorId($id);


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Listado</title>
</head>
<body>
	<p align="center"><?php require_once"../../menu.php"; ?></p>
	<table border="1" align="center">
		<thread>
			<th>ID</th>
			<th>Localidad</th>
			<th>Provincia</th>
		</thread>
		<tr>
			<td><?php echo $localidad->getIdLocalidad(); ?></td>
			<td><?php echo $localidad->getDescripcion(); ?></td>
			<td><?php echo $localidad->provincia->getDescripcion(); ?></td>
		</tr>
	</table>
	<p><a href="listado.php"  role="button">Atras</a>  </p>
</body>
</html>