<?php
require_once "../../class/Trago.php";
require_once "../../class/Producto.php";

$listadoProducto=Producto::ObtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarTrago.js"></script>
	<title>Alta Trago</title>
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
		<form name="frmDatos" method="POST" action="procesar/insert.php" id="frmDatos">
			<fieldset>
				<legend>Informacion Tragos</legend>
				<p><label>Nombre: <input type="text" name="txtNombre" id="txtNombre"></label></p>
				<p><label>Precio de Venta: <input type="text" name="txtPrecioVenta" id="txtPrecioVenta"></label></p>
				<input type="button" value="Guardar" onclick="validar();">
			</fieldset>
		</form>
	<a href="listado.php" role="button">Cancelar</a>
</body>
</html>