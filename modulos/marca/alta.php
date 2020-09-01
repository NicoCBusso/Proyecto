<?php ?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarMarca.js"></script>
	<title>Alta Marca</title>
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
			<p><label>Marca: <input type="text" name="txtNombre" id="txtNombre" ></label></p>
			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<a href="listado.php" role="button">Cancelar</a>
	</form>
</body>
</html>