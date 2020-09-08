<?php 
require_once '../../class/Trago.php';
$idTrago = $_GET['id'];
//echo $idTrago;
$trago = Trago::obtenerPorId($idTrago);
//highlight_string(var_export($trago,true));
?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarTrago.js"></script>
	<title>Glou Glou!</title>
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
									<h2>Actualizar Trago <small></small></h2>
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
										<input type="hidden" name="idTrago" value="<?php echo $idTrago; ?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="txtNombre" required="required" class="form-control" name="txtNombre" value="<?php echo $trago->getNombre();?>" id="txtNombre">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="precioVenta">Precio Venta <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtPrecioVenta" required="required" class="form-control" name="txtPrecioVenta" value="<?php echo $trago->getPrecioVenta();?>" id="txtPrecioVenta">
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
					
			<input type="hidden" name="idTrago" value="<?php echo $idTrago; ?>">
			<p><label>Nombre: <input type="text" name="txtNombre" value="<?php echo $trago->getNombre();?>" id="txtNombre"></label></p>		
			<p><label>Precio Venta: <input type="text" name="txtPrecioVenta" value="<?php echo $trago->getPrecioVenta();?>" id="txtPrecioVenta"></label></p>	
			<input type="button" value="Actualizar" onclick="validar();">
		</fieldset>
		<a href="listado.php">Atras</a>
	</form>
</body>
</html>
*/?>