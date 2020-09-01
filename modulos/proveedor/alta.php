<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarProveedor.js"></script>
	<title>Alta Proveedor</title>
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
	<form name="frmDatos" id="frmDatos" method="POST" action="procesar/insert.php">
		
		<fieldset>
			<legend>Ingrese los datos</legend>
			<p><label>Razon Social: <input type="text" id="txtRazonSocial" name="txtRazonSocial"></label></p>
			<p><label>Cuit: <input type="text" id="txtCuit"  name="txtCuit"></label></p>
			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<p><a href="listado.php" role="button">Cancelar</a></p>
	</form>
</body>
</html>