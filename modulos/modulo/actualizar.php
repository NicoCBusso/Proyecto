<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Modulo.php';

$id = $_GET ['id'];

$modulos = Modulo::obtenerPorId($id);
highlight_string(var_export($modulos,true));

?>
<html>
<head>
	<script src="../../js/validaciones/validarModulo.js"></script>
	<title>Modificar Modulo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<p><?php require_once "../../menu.php"; ?></p>
	<?php if (isset($_SESSION['mensaje_error'])) :?>
		<h3><font color="red">
			<?php
				echo $_SESSION['mensaje_error']; 
		        unset($_SESSION['mensaje_error']);
		    ?>
	    </font></h3>
    <?php endif;?>
	<form name="frmDatos" method="POST" action="procesar/update.php" id="frmDatos">
		<p>Acuerdese de actualizar todos los datos</p>
		<fieldset>
			<legend>Actualizar datos</legend>
				<input type="hidden" name="txtId" value="<?php echo $modulos->getIdModulo(); ?>">
				<p><label>Nombre: <input type="text" name="txtNombre" value="<?php echo $modulos->getDescripcion(); ?>" id="txtNombre"></label></p>
				<p><label>Directorio<input type="text" name="txtDirectorio" value="<?php echo $modulos->getDirectorio(); ?>" id="txtDirectorio"></label></p>
				<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<p><a href="listado.php" role="button">Cancelar</a></p>
	</form>
</body>
</html>
