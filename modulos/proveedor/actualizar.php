<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Proveedor.php';
$id = $_GET ['id'];

$proveedor = Proveedor::obtenerPorId($id);
?>
<html>
<head>
	<script src="../../js/validaciones/validarProveedor.js"></script>
	<title>Actualizar Proveedor</title>
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
	<form name="frmDatos" id="frmDatos"  method="POST" action="procesar/update.php">
		<p>Acuerdese de actualizar todos los datos</p>
		<fieldset>
			<legend>Actualizar datos</legend>
				<label for="txtId"></label>	<input type="hidden" name="txtId" value="<?php echo $proveedor->getIdProveedor(); ?>"
				<p><label>Razon Social: <input type="text" name="txtRazonSocial" id="txtRazonSocial" value="<?php echo $proveedor->getRazonSocial();?>"></label></p>
				<p><label>Cuit: <input type="text" name="txtCuit" id="txtCuit" value="<?php echo $proveedor->getCuit();?>"></label></p>
				<input type="button" value="Actualizar" onclick="validar();">
		</fieldset>
	</form>
	<p><a href="listado.php" role="button">Cancelar</a></p>
</body>
</html>
