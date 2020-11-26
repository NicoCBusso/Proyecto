<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Categoria.php';
$id = $_GET ['id'];

$categoria = Categoria::obtenerPorId($id);
?>
<html>
<head>
	<script src="../../js/validaciones/validarCategoria.js"></script>
	<title>Actualizar Categoria</title>
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
							<h2>Modificacion de Categoria</h2>
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
								<input type="hidden" name="txtId" value="<?php echo $categoria->getIdCategoria(); ?>">
								<div class="item form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 ">
										<input type="text" id="txtNombre" required="required" class="form-control" name="txtNombre" value="<?php echo $categoria->getNombre(); ?>">
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