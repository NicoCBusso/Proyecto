<?php 
require_once "../../class/Cargo.php";
$listadoCargo = Cargo::obtenerTodos();
?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarEmpleado.js"></script>
	<title>Alta Empleado</title>
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
				<p><label>Nombre: <input type="text" id="txtNombre"  name="txtNombre"></label></p>
				<p><label>Apellido: <input type="text" id="txtApellido"  name="txtApellido"></label></p>
				<p><label>Fecha de nacimiento: <input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento" required></label></p>
				<p><label>DNI: <input type="text" id="txtDni" name="txtDNI"></label></p>
				<p><label>Sexo: <select name="cboSexo" id="cboSexo">
					<option value="0">Seleccionar</option>
					<option value="1">Masculino</option>
					<option value="2">Femenino</option>
				</select></label></p>
				<p><label>Cargo: <select name="cboCargo" id="cboCargo">
					<option value="0">Seleccionar</option>
					<?php foreach ($listadoCargo as $cargo): ?>
						<option value="<?php echo $cargo->getIdCargo();?>"><?php echo $cargo->getNombre()?></option>
					<?php endforeach ?>
				</select></label></p>
				<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<a href="listado.php" role="button">Cancelar</a>		
	</form>
</body>
</html>