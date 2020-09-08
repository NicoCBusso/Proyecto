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
<body class="nav-md">
	<?php require_once "../../menu.php"; ?>
	<?php if (isset($_SESSION['mensaje_error'])) :?>
		<h3><font color="red">
			<?php
				echo $_SESSION['mensaje_error']; 
		        unset($_SESSION['mensaje_error']);
		    ?>
	    </font></h3>
    <?php endif;?>
	<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Agregar Producto <small></small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form  data-parsley-validate class="form-horizontal form-label-left" name="frmDatos" id="frmDatos" method="POST" action="procesar/update.php">
										<input type="hidden" name="txtIdProducto" value="<?php echo $producto->getIdProducto()?>">
										<input type="hidden" name="txtIdProductoFinal" value="<?php echo $producto->getIdProductoFinal()?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="txtNombre" required="required" class="form-control" name="txtNombre" value="<?php echo $producto->getNombre()?>" id="txtNombre" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="codigoBarra">CodigoBarra <span class="required" >*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtCodigoBarra" required="required" class="form-control" name="txtCodigoBarra" value="<?php echo $producto->getCodigoBarra()?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="contenidoMl">Contenido ml <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtContenido" required="required" class="form-control" name="txtContenido" value="<?php echo $producto->getContenido()?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="precioCompra">Precio Compra <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtPrecioCompra" required="required" class="form-control" name="txtPrecioCompra" value="<?php echo $producto->getPrecioCompra()?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="precioVenta">Precio Venta <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtPrecioVenta" required="required" class="form-control" name="txtPrecioVenta" value="<?php echo $producto->getPrecioVenta()?>">
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="envase">Envase <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboEnvase" id="cboEnvase" class="form-control">
													<option value="0">Seleccionar</option>
													<?php foreach ($listadoEnvase as $envase): ?>
														<option value="<?php echo $envase->getIdEnvase();?>"><?php echo $envase->getNombre()?></option>
													<?php endforeach ?>		
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="marca">Marca <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboMarca" id="cboMarca" class="form-control">
													<option value="0">Seleccionar</option>
													<?php foreach ($listadoMarca as $marca): ?>
														<option value="<?php echo $marca->getIdMarca();?>"><?php echo $marca->getNombre()?></option>
													<?php endforeach ?>		
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="categoria">Categoria <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboCategoria" id="cboCategoria" onchange="cargarSubCategoria();" class="form-control">
													<option value="0">Seleccionar</option>
													<?php foreach ($listadoCategoria as $categoria): ?>
														<option value="<?php echo $categoria->getIdCategoria();?>"><?php echo $categoria->getNombre()?></option>
													<?php endforeach ?>	
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="subCategoria">SubCategoria <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboSubCategoria" id="cboSubCategoria" class="form-control">
													<option value="0">Seleccionar</option>													
												</select>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="listado.php" role="button" class="btn btn-primary">Cancelar</a>
												<button class="btn btn-primary" type="reset">Borrar</button>
												<input type="button" value="Actualizar" class="btn btn-success" onclick="validar();">											
											</div>
										</div>


									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
	<?php require_once"../../footer.php"; ?> 
</body>
</html>
<?php /*
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
*/?>