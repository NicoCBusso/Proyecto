<?php

require_once '../../class/Provincia.php';

$id = $_GET['id'];

$provincia = Provincia::obtenerPorId($id);


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
			<th>Provincia</th>
			<th>Pais</th>
		</thread>
		<tr>
			<td><?php echo $provincia->getIdProvincia(); ?></td>
			<td><?php echo $provincia->getDescripcion(); ?></td>
			<td><?php echo $provincia->pais->getDescripcion(); ?></td>
		</tr>
	</table>
	<p><a href="listado.php"  role="button">Atras</a>  </p>
</body>
</html>