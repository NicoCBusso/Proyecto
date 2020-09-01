<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Usuario.php';
$id = $_GET ['id'];

$usuario = Usuario::obtenerPorId($id);
$listadoPerfil = Perfil::obtenerTodos();
//highlight_string(var_export($usuario,true));
?>
<html>
<head>
	<script src="../../js/validaciones/validarUsuario.js"></script>
	<title>Actualizar Usuario</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
	<form name="frmDatos" id="frmDatos" method="POST" action="procesar/update.php">
		<p>Acuerdese de actualizar todos los datos</p>
		<fieldset>
			<legend>Actualizar datos</legend>
			<label for="txtId"></label>	<input type="hidden" name="txtId" value="<?php echo $usuario->getIdUsuario(); ?>">
			<input type="hidden" name="txtUsername" id="txtUsername" value="<?php echo $usuario->getUsername(); ?>">
			<p><label>Password: <input type="password" id="txtPassword" name="txtPassword" value="<?php echo $usuario->getPassword(); ?>"></label></p>
			<p><label>Perfil: <select id="cboPerfil" name="cboPerfil">
				<option value="0">Seleccionar</option>
				<?php foreach ($listadoPerfil as $perfil): ?>
					<option value="<?php echo $perfil->getIdPerfil();?>"><?php echo $perfil->getDescripcion()?></option>
				<?php endforeach ?>
			</select></label></p>
			<p><label>Nombre: <input type="text" id="txtNombre" name="txtNombre" value="<?php echo $usuario->getNombre(); ?>"></label></p>
			<p><label>Apellido: <input type="text" id="txtApellido" name="txtApellido" value="<?php echo $usuario->getApellido(); ?>"></label></p>
			<p><label>Fecha de nacimiento: <input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento" value="<?php echo $usuario->getFechaNacimiento(); ?>"></label></p>
			<p><label>DNI: <input type="text" id="txtDni" name="txtDni" value="<?php echo $usuario->getDni(); ?>"></label></p>
			<p><label>Sexo: <select id="cboSexo" name="cboSexo">
				<option value="0">Seleccionar</option>
				<option value="1">Masculino</option>
				<option value="2">Femenino</option>
			</select></label></p>
			<input type="button" value="Guardar" onclick="validar();">	</fieldset>
		</fieldset>
	</form>
	<a href="listado.php" role="button">Cancelar</a>
</body>
</html>
