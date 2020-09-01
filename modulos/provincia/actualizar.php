<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Provincia.php';
$id = $_GET ['id'];
$listadoPais = Pais::obtenerTodos();
$provincia = Provincia::obtenerPorId($id);
?>
<html>
<head>
	<script src="../../js/validaciones/validarProvincia.js"></script>
	<title>Actualizar Provincia</title>
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
	<form name="frmDatos"  id="frmDatos" method="POST" action="procesar/update.php">
		<p>Acuerdese de actualizar todos los datos</p>
		<fieldset>
			<legend>Actualizar datos</legend>
				<label for="txtId"></label>	<input type="hidden" name="txtId" value="<?php echo $provincia->getIdProvincia(); ?>">
				<p><label>Nombre: <input type="text" name="txtNombre" id="txtNombre"  value="<?php echo $provincia->getDescripcion(); ?>"></label></p>
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
