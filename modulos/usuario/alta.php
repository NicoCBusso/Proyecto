<?php

require_once '../../class/Perfil.php';
$listadoPerfil = Perfil::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarUsuario.js"></script>
	<title>Alta usuario</title>
</head>
<body>
<form name="frmDatos" id ="frmDatos" method="POST" action="procesar/insert.php">
	<p align="center"><?php require_once"../../menu.php"; ?></p>
	<?php if (isset($_SESSION['mensaje_error'])) :?>
		<h3><font color="red">
			<?php
				echo $_SESSION['mensaje_error']; 
		        unset($_SESSION['mensaje_error']);
		    ?>
	    </font></h3>
    <?php endif;?>		
	<fieldset>
		<legend>Ingrese los datos</legend>
		<p><label>Username: <input type="text" id ="txtUsername" name="txtUsername"></label></p>
		<p><label>Contraseña: <input type="password" id ="txtPassword" name="txtPassword"></label></p>
		<p><label>Perfil: <select  id ="cboPerfil" name="cboPerfil">
			<option value="0">Seleccionar</option>
			<?php foreach ($listadoPerfil as $perfil): ?>
				<option value="<?php echo $perfil->getIdPerfil();?>"><?php echo $perfil->getDescripcion()?></option>
			<?php endforeach ?>
		</select>
		<p><label>Nombre: <input type="text" id ="txtNombre" name="txtNombre"></label></p>
		<p><label>Apellido: <input type="text" id ="txtApellido" name="txtApellido"></label></p>
		<p><label>Fecha de nacimiento: <input type="date" id ="txtFechaNacimiento" name="txtFechaNacimiento"></label></p>
		<p><label>DNI: <input type="text" id ="txtDni" name="txtDni"></label></p>
		<p><label>Sexo: <select name="cboSexo" id ="cboSexo">
			<option value="0">Seleccionar</option>
			<option value="1">Masculino</option>
			<option value="2">Femenino</option>
		</select></label></p>
		<input type="button" value="Guardar" onclick="validar();">
	</fieldset>
	<a href="listado.php" role="button">Cancelar</a>
</form>
</body>
</html>