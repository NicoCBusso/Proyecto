<?php

require_once "../../class/Localidad.php";
$listadoProvincia = Provincia::obtenerTodos();
?>
<!DOCTYPE html>

<html>
<head>
	<script src="../../js/validaciones/validarLocalidad.js"></script>
	<title>Alta localidad</title>
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
			<p><label>Localidad: <input type="text" name="txtNombre" id="txtNombre" ></label></p>
			<p><label><select name="cboProvincia" id="cboProvincia" ></label></p>
				<option value="0">Seleccionar</option>
				<?php foreach ($listadoProvincia as $provincia): ?>
				
				<option value="<?php echo $provincia->getIdProvincia(); ?>"><?php echo $provincia->getDescripcion(); ?></option> 
				
				<?php endforeach ?>
			</select></label></p>
			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<a href="listado.php" role="button">Cancelar</a>
	</form>
</body>
</html>