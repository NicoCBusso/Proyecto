<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Empleado.php';
$id = $_GET ['id'];

$empleado = Empleado::obtenerPorId($id);
?>
<html>
<head>
<title>Actualizar Empleado</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="frmDatos" method="POST" action="procesar/update.php">
	<p>Acuerdese de actualizar todos los datos</p>
	<fieldset>
		<legend>Actualizar datos</legend>
		<label for="txtId"></label>	<input type="hidden" name="txtId" value="<?php echo $empleado->getEmpleado(); ?>">
		<p><label>Nombre: <input type="text" name="txtNombre" value="<?php echo $empleado->getNombre(); ?>"></label></p>
		<p><label>Apellido: <input type="text" name="txtApellido" value="<?php echo $empleado->getApellido(); ?>"></label></p>
		<p><label>Fecha de nacimiento: <input type="date" name="txtFechaNacimiento" value="<?php echo $empleado->getFechaNacimiento(); ?>"></label></p>
		<p><label>DNI: <input type="text" name="txtDni" value="<?php echo $empleado->getDni(); ?>"></label></p>
		<p><label>Sexo: <select name="cboSexo">
			<option value=1>Masculino</option>
			<option value=2>Femenino</option>
		</select></label></p>
		<p><label>Cargo: <select name="cboCargo">
			<option value=1>Barman</option>
			<option value=2>Cajero</option>
			<option value=3>Bailarina</option>
			<option value=4>Encargado</option>
		</select></label></p>
		<a href="listadoCliente.php" role="button">Cancelar</a>
		<button type="submit">Actualizar</button>
	</fieldset>
</body>
</html>
