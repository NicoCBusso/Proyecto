<?php
require_once "../../class/SubCategoria.php";
$idCategoria = $_GET['id'];
$listadoSubCategoria = SubCategoria::obtenerPorIdCategoria($idCategoria);
//highlight_string(var_export($listadoSubCategoria,true));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado SubCategorias</title>
</head>
<body>
	<p align="center"><?php require_once"../../menu.php"; ?></p>
	<a href="alta.php?id=<?php echo $idCategoria; ?>"  role="button">Agregar</a>
	<table align="center" border="1 " width="50% ">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<?php foreach ($listadoSubCategoria as $subcategoria): ?>
			<tbody align="center">
				<tr>
					<td><?php echo $subcategoria->getNombre(); ?></td>
					<td><a href="actualizar.php?id=<?php echo $subcategoria->getIdSubCategoria(); ?>&idCategoria=<?php echo $idCategoria;?>" role="button" title="Editar">Actualizar</a>
					</td>
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>
	<a href="../categoria/listado.php"  role="button">Atras</a> 
</body>
</html>
