<!DOCTYPE html>
<html>
<head>
	<title>Alta empleado</title>
</head>
<body>
<form name="frmDatos" method="POST" action="procesar/insert.php">
	<fieldset>
		<legend>Ingrese los datos</legend>
		<p><label>Nombre: <input type="text" name="txtNombre"></label></p>
		<p><label>Apellido: <input type="text" name="txtApellido"></label></p>
		<p><label>Fecha de nacimiento: <input type="date" name="txtFechaNacimiento"></label></p>
		<p><label>DNI: <input type="text" name="txtDNI"></label></p>
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
		<button type="submit">Guardar</button>
	</fieldset>
</form>
</body>
</html>