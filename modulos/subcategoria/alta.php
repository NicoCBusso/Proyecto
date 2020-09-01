<?php 
require_once '../../class/SubCategoria.php';
$idCategoria = $_GET['id'];
//echo $idCategoria;
//$listadoCategoria = Categoria::obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarCategoria.js"></script>
	<title>Alta SubCategoria</title>
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
	<form name="frmDatos" method="POST" action="procesar/insert.php" id="frmDatos">
		<fieldset>
			<legend>Ingrese los datos</legend>
				<input type="hidden" name="idCategoriaVer" value="<?php echo $idCategoria; ?>">		
				<input type="hidden" name="id" value="<?php echo $idCategoria; ?>">
			<p><label>Nombre: <input type="text" name="txtNombre" id="txtNombre"></label></p>		
			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
	</form>
</body>
</html>