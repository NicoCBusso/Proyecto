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
		<button type="submit">Guardar</button>
	</fieldset>
</form>
</body>
</html>