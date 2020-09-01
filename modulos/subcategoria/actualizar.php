<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/SubCategoria.php';
$id = $_GET ['id'];
$idCategoria = $_GET['idCategoria'];
$subcategoria = SubCategoria::obtenerPorId($id);
$listadoCategoria = Categoria::obtenerTodos();
?>
<html>
<head>
	<script src="../../js/validaciones/validarSubCategoria.js"></script>
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
				<input type="hidden" name="txtId" value="<?php echo $subcategoria->getIdSubCategoria(); ?>">
				<input type="hidden" name="idCategoriaVer" value="<?php echo $idCategoria ?>">
			<p><label>Nombre: <input type="text" name="txtNombre" value="<?php echo $subcategoria->getNombre(); ?>" id="txtNombre"></label></p>
			<p><label>Categoria: <select name="cboCategoria" id="cboCategoria"></label></p>
				<option value="0">Seleccionar</option>
				<?php foreach ($listadoCategoria as $categoria): ?>
				
				<option value="<?php echo $categoria->getIdCategoria(); ?>"><?php echo $categoria->getNombre(); ?></option> 
				
				<?php endforeach ?>			
			</select>
			<input type="button" value="Actualizar" onclick="validar();">
		</fieldset>

	</form>
	<a href="listado.php?id=<?php echo $idCategoria;?>" role="button">Cancelar</a>
</body>
</html>