<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Marca.php';
$id = $_GET ['id'];

$marca = Marca::obtenerPorId($id);
?>
<html>
<head>
	<script src="../../js/validaciones/validarMarca.js"></script>
	<title>Actualizar Marca</title>
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
			<legend>Actualizar datos</legend>
			<label for="txtId"></label>	<input type="hidden" name="txtId" value="<?php echo $marca->getIdMarca(); ?>">
			<p><label>Nombre: <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $marca->getNombre(); ?>"></label></p>	
			<input type="button" value="Actualizar" onclick="validar();">
		</fieldset>
	</form>
	<a href="listado.php" role="button">Cancelar</a>
</body>
</html>