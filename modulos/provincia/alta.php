<?php
require_once '../../class/Provincia.php';

$listadoPais = Pais::obtenertodos();
?>

<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarProvincia.js"></script>
	<title>Alta provincia</title>
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
			<p><label>Provincia: <input type="text" id="txtNombre" name="txtNombre"></label></p>
			<p><label>Pais: <select name="cboPais" id="cboPais" ></label></p>
						<option value="0">Seleccionar</option>
						<?php foreach ($listadoPais as $pais): ?>
						
						<option value="<?php echo $pais->getIdPais(); ?>"><?php echo $pais->getDescripcion(); ?></option> 
						
						<?php endforeach ?>
					</select></label></p>
			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<p><a href="listado.php" role="button">Cancelar</a></p>
	</form>
</body>
</html>