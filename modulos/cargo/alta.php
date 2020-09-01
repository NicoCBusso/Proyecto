<?php
require_once "../../class/Cargo.php";
?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarCargo.js"></script>
	<title>Alta Cargo</title>
</head>
<body>
	<p align="center"><?php require_once "../../menu.php"; ?></p>
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
			<p><label>Nombre: <input type="text" name="txtNombre" id="txtNombre"></label></p>
			</select>
			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<a href="listado.php" role="button">Cancelar</a>
	</form>
</body>
</html>