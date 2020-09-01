<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Modulo.php';
require_once '../../class/Perfil.php';
$id = $_GET ['id'];

$perfil = Perfil::obtenerPorId($id);
$listadoModulos = Modulo::obtenerTodos();

?>
<html>
<head>
	<script src="../../js/validaciones/validarPerfil.js"></script>
	<title>Modificar Perfil</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
	<form name="frmDatos" id="frmDatos" method="POST" action="procesar/update.php">
		<p>Acuerdese de actualizar todos los datos</p>
		<fieldset>
			<legend>Actualizar datos</legend>				
				<input type="hidden" name="txtId" value="<?php echo $perfil->getIdPerfil(); ?>">				
				<p><label>Nombre: <input type="text" id="txtNombre" name="txtNombre" value="<?php echo $perfil->getDescripcion(); ?>"></label></p>
				<select name="cboModulos[]" id="cboModulos" multiple style="width: 250px; height: 250px;">	
					<?php foreach($listadoModulos as $modulo) :?>
						<?php
							$selected = '';
							$idModulo = $modulo->getIdModulo();
							if ($perfil->tieneModulo($idModulo)) {
			         			$selected = "SELECTED";
			         		}
						?>
						<option value="<?php echo $modulo->getIdModulo(); ?>" <?php echo $selected ?> >
							<?php echo $modulo ?>
						</option>
					<?php endforeach ?>
				</select>
			<input type="button" value="Actualizar" onclick="validar();">
		</fieldset>
		<p><a href="listado.php" role="button">Cancelar</a></p>
	</form>
</body>
</html>
