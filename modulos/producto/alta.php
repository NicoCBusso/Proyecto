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
	<script type="text/javascript" src="../../js/functions/producto/functions.js" ></script>
	<title>Alta Producto</title>
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
									<form  data-parsley-validate class="form-horizontal form-label-left" name="frmDatos" id="frmDatos" method="POST" action="procesar/insert.php">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="txtNombre" required="required" class="form-control" name="txtNombre" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="codigoBarra">CodigoBarra <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtCodigoBarra" required="required" class="form-control" name="txtCodigoBarra" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="contenidoMl">Contenido ml <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtContenido" required="required" class="form-control" name="txtContenido" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="precioCompra">Precio Compra <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtPrecioCompra" required="required" class="form-control" name="txtPrecioCompra" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="precioVenta">Precio Venta <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtPrecioVenta" required="required" class="form-control" name="txtPrecioVenta" >
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
												<input type="button" value="Guardar" class="btn btn-success" onclick="validar();">											
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