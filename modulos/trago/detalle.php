<?php 
require_once '../../class/Trago.php';
$idTrago = $_GET['id'];
$trago = Trago::obtenerPorId($idTrago);
//highlight_string(var_export($trago,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Lista de Tragos</title>
</head>

<body>
	<p align="center"><?php require_once"../../menu.php"; ?></p>
	<a href="alta.php"  role="button">Agregar</a>
	<table align="center" border="1 " width="60% ">
    <thead>
      <tr>
      	<th>ID</th>
        <th>Trago</th>
        <th>Precio Venta</th>
      </tr>
    </thead>
      <tbody align="center">
        <tr>
        	<td> <?php echo $trago->getIdTrago();?></td>
			<td> <?php echo $trago->getNombre(); ?> </td>
			<td> <?php echo $trago->getPrecioVenta()?>$</td>
        </tr>
      </tbody>
	</table>
	<br>
	<table align="center" border="1 " width="60% ">
		<thead>
			<tr>
				<th>ID</th	>
				<th>Ingrediente</th>
				<th>Cantidad</th>
			</tr>
		</thead>
		<?php foreach($trago->getArrProductoTrago() as $ingredientes) :?>
			<tbody align="center">
					<td><?php echo $ingredientes->getIdProductoTrago();?></td>
					<td><?php echo $ingredientes->producto->getNombre();?></td>
					<td><?php echo $ingredientes->getCantidad();?></td>	
			</tbody>			
		<?php endforeach ?>

	</table>
	<a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
