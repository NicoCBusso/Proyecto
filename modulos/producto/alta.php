<?php
require_once '../../class/Producto.php';
require_once '../../class/Envase.php';
require_once '../../class/Marca.php';
require_once '../../class/SubCategoria.php';

$listadoEnvase = Envase::obtenerTodos();
//highlight_string(var_export($listadoEnvase,true));
$listadoMarca = Marca::obtenerTodos();
$listadoCategoria = Categoria::obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script src="../../js/validaciones/validarProducto.js"></script>
	<script type="text/javascript">
		function cargarSubCategoria(){
			var idCategoria = $("#cboCategoria").val();

			var params = {id: idCategoria};

			$.get("obtenerSubCategorias.php", params, function(datos){

				$("#cboSubCategoria").html(datos);
			});
		}
	</script>
	<title>Alta Producto</title>
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
	<form name="frmDatos" method="POST" action="procesar/insert.php">
		<fieldset>
			<legend>Ingrese los datos</legend>
			<p><label>Nombre: <input type="text" name="txtNombre" id="txtNombre"></label></p>
			<p><label>CodigoBarra: <input type="text" name="txtCodigoBarra" maxlength="10" id="txtCodigoBarra"></label></p>
			<p><label>Contenido ml: <input type="text" name="txtContenido" id="txtContenido"></label></p>
			<p><label>Precio de Compra: <input type="text" value=" " name="txtPrecioCompra" id="txtPrecioCompra"></label></p>
			<p><label>Precio de Venta: <input type="text" name="txtPrecioVenta" id="txtPrecioVenta"></label></p>
			<p><label>Envase: <select name="cboEnvase" id="cboEnvase">
				<option value="0">Seleccionar</option>
				<?php foreach ($listadoEnvase as $envase): ?>
					<option value="<?php echo $envase->getIdEnvase();?>"><?php echo $envase->getNombre()?></option>
				<?php endforeach ?>
			</select></label></p>
			<p><label>Marca: <select name="cboMarca" id="cboMarca">
				<option value="0">Seleccionar</option>
				<?php foreach ($listadoMarca as $marca): ?>
					<option value="<?php echo $marca->getIdMarca();?>"><?php echo $marca->getNombre()?></option>
				<?php endforeach ?>
			</select></label></p>
			<p><label>Categoria: <select name="cboCategoria" id="cboCategoria" onchange="cargarSubCategoria();">
				<option value="0">Seleccionar</option>
				<?php foreach ($listadoCategoria as $categoria): ?>
					<option value="<?php echo $categoria->getIdCategoria();?>"><?php echo $categoria->getNombre()?></option>
				<?php endforeach ?>
			</select>
			<p><label>SubCategoria: <select name="cboSubCategoria" id="cboSubCategoria">
				<option value= "0">Seleccionar</option>
			</select></label></p>
			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
	</form>	
	<a href="listado.php"  role="button">Atras</a> 
</body>
</html>
