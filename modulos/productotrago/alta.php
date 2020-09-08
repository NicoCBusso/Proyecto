<?php 
require_once '../../class/ProductoTrago.php';
$idTrago = $_GET['id'];
//	echo $idTrago;
$listadoProducto = Producto::obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarIngrediente.js"></script>
	<title>Alta Ingrediente</title>
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
										<input type="hidden" name="idTragoVer" value="<?php echo $idTrago; ?>">		
										<input type="hidden" name="id" value="<?php echo $idTrago; ?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="ingrediente">Ingrediente <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboProducto" id="cboProducto" class="form-control">
													<option value="0">Seleccionar</option>
													<?php foreach ($listadoProducto as $producto): ?>
														<option value="<?php echo $producto->getIdProducto();?>"  ><?php echo $producto->getNombre();?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="cantidadMl">Cantidad ml <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtCantidad" required="required" class="form-control" name="txtCantidad" >
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="listado.php?id=<?php echo $idTrago?>" role="button" class="btn btn-primary">Cancelar</a>
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
	<form name="frmDatos"  id="frmDatos" method="POST" action="procesar/insert.php">
		<fieldset>
			<legend>Ingrese los datos</legend>
				<input type="hidden" name="idTragoVer" value="<?php echo $idTrago; ?>">		
				<input type="hidden" name="id" value="<?php echo $idTrago; ?>">
			<p><label>Ingrediente : <select name="cboProducto" id="cboProducto">
				<option value="0">Seleccionar</option>
				<?php foreach ($listadoProducto as $producto): ?>
					<option value="<?php echo $producto->getIdProducto();?>"  ><?php echo $producto->getNombre();?></option>
				<?php endforeach ?>
			</select></label></p>
			<p><label>Cantidad: <input type="text" name="txtCantidad" id="txtCantidad"></label></p>		
			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<a href="listado.php?id=<?php echo $idTrago?>">Atras</a>
	</form>
</body>
</html>
*/?>