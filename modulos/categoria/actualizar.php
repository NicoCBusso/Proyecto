<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Categoria.php';
$id = $_GET ['id'];

$categoria = Categoria::obtenerPorId($id);
?>
<html>
<head>
	<script src="../../js/validaciones/validarCategoria.js"></script>
	<title>Actualizar Categoria</title>
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
		<form name="frmDatos" method="POST" action="procesar/update.php" id="frmDatos">
			<p>Acuerdese de actualizar todos los datos</p>
			<fieldset>
				<legend>Actualizar datos</legend>
				<label for="txtId"></label>	<input type="hidden" name="txtId" value="<?php echo $categoria->getIdCategoria(); ?>">
				<p><label>Nombre: <input type="text" name="txtNombre" value="<?php echo $categoria->getNombre(); ?>" id="txtNombre"></label></p>		
				<input type="button" value="Guardar" onclick="validar();">
			</fieldset>
			<a href="listado.php" role="button">Cancelar</a>
		</form>
</body>
</html>