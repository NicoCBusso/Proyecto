<?php
require_once '../../class/Producto.php';
require_once '../../class/Envase.php';
require_once '../../class/Marca.php';
require_once '../../class/SubCategoria.php';
$id = $_GET['id'];
$listadoEnvase = Envase::obtenerTodos();
//highlight_string(var_export($listadoEnvase,true));
$listadoMarca = Marca::obtenerTodos();
$listadoCategoria = Categoria::obtenerTodos();
$producto = Producto::obtenerPorId($id);
//highlight_string(var_export($producto,true));
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
	<title>Actualizar Producto</title>
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
		<input type="hidden" name="txtIdProducto" value="<?php echo $producto->getIdProducto()?>">
		<input type="hidden" name="txtIdProductoFinal" value="<?php echo $producto->getIdProductoFinal()?>">
		<p><label>Nombre: <input type="text" name="txtNombre" value="<?php echo $producto->getNombre()?>" id="txtNombre"></label></p>
		<p><label>CodigoBarra: <input type="text" name="txtCodigoBarra" maxlength="10" value="<?php echo $producto->getCodigoBarra()?>" id="txtCodigoBarra"></label></p>
		<p><label>Contenido ml: <input type="text" name="txtContenido" maxlength="4"  value="<?php echo $producto->getContenido()?>" id="txtContenido"></label></p>
		<p><label>Precio de Compra: <input type="text" name="txtPrecioCompra" value="<?php echo $producto->getPrecioCompra()?>" id="txtPrecioCompra"></label></p>
		<p><label>Precio de Venta: <input type="text" name="txtPrecioVenta" value="<?php echo $producto->getPrecioVenta()?>" id="txtPrecioVenta"></label></p>
		<p><label>Envase: <select name="cboEnvase" id="cboEnvase">
			<option>Seleccionar</option>
			<?php foreach ($listadoEnvase as $envase): ?>
				<option value="<?php echo $envase->getIdEnvase();?>"><?php echo $envase->getNombre()?></option>
			<?php endforeach ?>
		</select></label></p>
		<p><label>Marca: <select name="cboMarca" id="cboMarca">
			<option>Seleccionar</option>
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
		<a href="listado.php"  role="button">Atras</a> 
</body>
</html>