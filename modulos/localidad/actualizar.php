<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Localidad.php';
$id = $_GET ['id'];
$listadoProvincia = Provincia::obtenerTodos();
$localidad = Localidad::obtenerPorId($id);
?>
<html>
<head>
	<script src="../../js/validaciones/validarLocalidad.js"></script>
	<title>Actualizar Localidad</title>
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

		<fieldset>
			<legend>Datos Antiguos</legend>
			<p><label>Localidad: <?php echo $localidad->getDescripcion();?></label></p>
			<p><label>Provincia: <?php echo $localidad->provincia->getDescripcion();?></label></p>
		</fieldset>
		<fieldset>
			<legend>Actualizar datos</legend>
				<label for="txtId"></label>	<input type="hidden" name="txtId" value="<?php echo $localidad->getIdLocalidad(); ?>">
				<p><label>Localidad: <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $localidad->getDescripcion(); ?>"></label></p>
				<p><label>Provincia: <select name="cboProvincia" id="cboProvincia"></label></p>
					<option value="0">Seleccionar</option>
					<?php foreach ($listadoProvincia as $provincia): ?>
					
					<option value="<?php echo $provincia->getIdProvincia(); ?>"><?php echo $provincia->getDescripcion(); ?></option> 
					
					<?php endforeach ?>
				</select></label></p>			
				
				<input type="button" value="Actualizar" onclick="validar();">
		</fieldset>
		<p><a href="listado.php" role="button">Cancelar</a></p>
	</form>
</body>
</html>
