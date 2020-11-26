<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Proveedor.php';
$id = $_GET ['id'];

$proveedor = Proveedor::obtenerPorId($id);
?>
<html>
<head>
	<script src="../../js/validaciones/validarProveedor.js"></script>
	<title>Actualizar Proveedor</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body class="nav-md">
	<?php require_once "../../menu.php"; ?>	
	<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Agregar Proveedor <small></small></h2>
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
										<?php if (isset($_SESSION['mensaje_error'])) :?>
											<h4><font color="red">
												<?php
													echo $_SESSION['mensaje_error']; 
											        unset($_SESSION['mensaje_error']);
											    ?>
										    </font></h4>
									    <?php endif;?>
										</label>	<input type="hidden" name="txtId" value="<?php echo $proveedor->getIdProveedor(); ?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="razonSocial">Razon Social <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" required="required" class="form-control" name="txtRazonSocial" id="txtRazonSocial" value="<?php echo $proveedor->getRazonSocial();?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="cuit">Cuit <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" required="required" class="form-control" name="txtCuit" id="txtCuit"  value="<?php echo $proveedor->getCuit();?>">
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
	<form name="frmDatos" id="frmDatos"  method="POST" action="procesar/update.php">
		<p>Acuerdese de actualizar todos los datos</p>
		<fieldset>
			<legend>Actualizar datos</legend>
				<label for="txtId"></label>	<input type="hidden" name="txtId" value="<?php echo $proveedor->getIdProveedor(); ?>"
				<p><label>Razon Social: <input type="text" name="txtRazonSocial" id="txtRazonSocial" value="<?php echo $proveedor->getRazonSocial();?>"></label></p>
				<p><label>Cuit: <input type="text" name="txtCuit" id="txtCuit" value="<?php echo $proveedor->getCuit();?>"></label></p>
				<input type="button" value="Actualizar" onclick="validar();">
		</fieldset>
	</form>
	<p><a href="listado.php" role="button">Cancelar</a></p>
</body>
</html>
*/?>