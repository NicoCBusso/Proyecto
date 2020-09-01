<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Empleado.php';
require_once "../../class/Cargo.php";

$listadoCargo = Cargo::obtenerTodos();
$id = $_GET ['id'];
$empleado = Empleado::obtenerPorId($id);
?>
<html>
<head>
	<script src="../../js/validaciones/validarEmpleado.js"></script>
	<title>Actualizar Empleado</title>
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
			<label for="txtId"></label>	<input type="hidden" name="txtId" value="<?php echo $empleado->getEmpleado(); ?>">
			<p><label>Nombre: <input type="text" id="txtNombre" name="txtNombre" value="<?php echo $empleado->getNombre(); ?>"></label></p>
			<p><label>Apellido: <input type="text" id="txtApellido" name="txtApellido" value="<?php echo $empleado->getApellido(); ?>"></label></p>
			<p><label>Fecha de nacimiento: <input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento" value="<?php echo $empleado->getFechaNacimiento(); ?>"></label></p>
			<p><label>DNI: <input type="text" id="txtDni" name="txtDni" value="<?php echo $empleado->getDni(); ?>"></label></p>
			<p><label>Sexo: <select id="cboSexo" name="cboSexo">
				<option value="0">Seleccionar</option>
				<option value="1">Masculino</option>
				<option value="2">Femenino</option>
			</select></label></p>
			<p><label>Cargo: <select id="cboCargo" name="cboCargo">
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
