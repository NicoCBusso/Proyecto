<?php 
require_once '../../class/Trago.php';
$idTrago = $_GET['id'];
//echo $idTrago;
$trago = Trago::obtenerPorId($idTrago);
//highlight_string(var_export($trago,true));
?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarTrago.js"></script>
	<title>Alta Ingrediente</title>
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
		<fieldset>
			<legend>Ingrese los datos</legend>
					
			<input type="hidden" name="idTrago" value="<?php echo $idTrago; ?>">
			<p><label>Nombre: <input type="text" name="txtNombre" value="<?php echo $trago->getNombre();?>" id="txtNombre"></label></p>		
			<p><label>Precio Venta: <input type="text" name="txtPrecioVenta" value="<?php echo $trago->getPrecioVenta();?>" id="txtPrecioVenta"></label></p>	
			<input type="button" value="Actualizar" onclick="validar();">
		</fieldset>
		<a href="listado.php">Atras</a>
	</form>
</body>
</html>