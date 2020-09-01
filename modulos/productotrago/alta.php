<?php 
require_once '../../class/ProductoTrago.php';
$idTrago = $_GET['id'];
//	echo $idTrago;
$listadoProducto = Producto::obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarIngrediente.js"></script>
	<title>Alta Ingrediente</title>
</head>
<body>
	<p align="center"><?php require_once"../../menu.php"; ?></p>
	<?php if (isset($_SESSION['mensaje_error'])) :?>
		<h3><font color="red">
			<?php
				echo $_SESSION['mensaje_error']; 
		        unset($_SESSION['mensaje_error']);
		    ?>
	    </font></h3>
    <?php endif;?>	
	<form name="frmDatos"  id="frmDatos" method="POST" action="procesar/insert.php">
		<fieldset>
			<legend>Ingrese los datos</legend>
				<input type="hidden" name="idTragoVer" value="<?php echo $idTrago; ?>">		
				<input type="hidden" name="id" value="<?php echo $idTrago; ?>">
			<p><label>Ingrediente : <select name="cboProducto" id="cboProducto">
				<option value="0">Seleccionar</option>
				<?php foreach ($listadoProducto as $producto): ?>
					<option value="<?php echo $producto->getIdProducto();?>"  ><?php echo $producto->getNombre();?></option>
				<?php endforeach ?>
			</select></label></p>
			<p><label>Cantidad: <input type="text" name="txtCantidad" id="txtCantidad"></label></p>		
			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<a href="listado.php?id=<?php echo $idTrago?>">Atras</a>
	</form>
</body>
</html>