<?php
require_once "../../class/Modulo.php";

$listadoModulos = Modulo::obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarPerfil.js"></script>
	<title>Alta perfil</title>
</head>
<body>
	<p align="center"><?php require_once "../../menu.php"; ?></p>
	<?php if (isset($_SESSION['mensaje_error'])) :?>
		<h3><font color="red">
			<?php
				echo $_SESSION['mensaje_error']; 
		        unset($_SESSION['mensaje_error']);
		    ?>
	    </font></h3>
    <?php endif;?>
	<form name="frmDatos"  id="frmDatos" method="POST" action="procesar/insert.php">
		<fieldset>
			<legend>Ingrese los datos</legend>
			<p><label>Perfil: <input type="text" name="txtNombre" id="txtNombre" ></label></p>
			<select name="cboModulos[]" multiple style="width: 250px; height: 250px;" id="cboModulos" >
				<?php foreach($listadoModulos as $modulo) :?>
					<option value="<?php echo $modulo->getIdModulo(); ?>">
						<?php echo $modulo ?>
					</option>
				<?php endforeach ?>
			</select>

			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<a href="listado.php" role="button">Cancelar</a>
	</form>
</body>
</html>