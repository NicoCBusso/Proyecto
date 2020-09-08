<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Cargo.php';

$id = $_GET ['id'];

$cargo = Cargo::obtenerPorId($id);
//highlight_string(var_export($cargo,true));

?>
<html>
<head>
	<script src="../../js/validaciones/validarCargo.js"></script>
	<title>Modificar Cargo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
									<h2>Modificacion de Cargo <small>different form elements</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form  data-parsley-validate class="form-horizontal form-label-left" name="frmDatos" id="frmDatos" method="POST" action="procesar/update.php">
										<input type="hidden" name="txtId" value="<?php echo $cargo->getIdCargo(); ?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="txtNombre" required="required" class="form-control" name="txtNombre" value="<?php echo $cargo->getNombre(); ?>">
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
	<form name="frmDatos"  id="frmDatos" method="POST" action="procesar/update.php">
		<p>Acuerdese de actualizar todos los datos</p>
		<fieldset>
			<legend>Actualizar datos</legend>
				<input type="hidden" name="txtId" value="<?php echo $cargo->getIdCargo(); ?>">
				<p><label>Nombre: <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $cargo->getNombre(); ?>"></label></p>
				<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
	</form>
*/?>