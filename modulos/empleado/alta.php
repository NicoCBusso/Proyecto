<?php 
require_once "../../class/Cargo.php";
$listadoCargo = Cargo::obtenerTodos();
?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarEmpleado.js"></script>
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
									<h2>Agregar Empleado <small></small></h2>
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombre <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" required="required" class="form-control" name="txtNombre" id="txtNombre" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="apellido">Apellido <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" required="required" class="form-control" name="txtApellido" id="txtApellido" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="dni">DNI <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" required="required" class="form-control" name="txtDni" id="txtDni" maxlength="8" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Genero</label>
											<div class="col-md-6 col-sm-6 ">
												<div  class="btn-group" data-toggle="buttons">
													<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="cboSexo" id="cboSexo" value="1" class="join-btn"> &nbsp; Masculino &nbsp;
													</label>
													<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="cboSexo" id="cboSexo" value="2" class="join-btn"> Femenino
													</label>
												</div>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Nacimiento <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="txtFechaNacimiento" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="txtFechaNacimiento">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="cargo">Cargo <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboCargo" id="cboCargo" class="form-control">
													<option value="0">Seleccionar</option>
													<?php foreach ($listadoCargo as $cargo): ?>
														<option value="<?php echo $cargo->getIdCargo();?>"><?php echo $cargo->getNombre()?></option>
													<?php endforeach ?>	
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
	<form name="frmDatos" id="frmDatos" method="POST" action="procesar/insert.php">
		<fieldset>
			<legend>Ingrese los datos</legend>
				<p><label>Nombre: <input type="text" id="txtNombre"  name="txtNombre"></label></p>
				<p><label>Apellido: <input type="text" id="txtApellido"  name="txtApellido"></label></p>
				<p><label>Fecha de nacimiento: <input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento" required></label></p>
				<p><label>DNI: <input type="text" id="txtDni" name="txtDNI"></label></p>
				<p><label>Sexo: <select name="cboSexo" id="cboSexo">
					<option value="0">Seleccionar</option>
					<option value="1">Masculino</option>
					<option value="2">Femenino</option>
				</select></label></p>
				<p><label>Cargo: <select name="cboCargo" id="cboCargo">
					<option value="0">Seleccionar</option>
					<?php foreach ($listadoCargo as $cargo): ?>
						<option value="<?php echo $cargo->getIdCargo();?>"><?php echo $cargo->getNombre()?></option>
					<?php endforeach ?>
				</select></label></p>
				<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<a href="listado.php" role="button">Cancelar</a>		
	</form>
</body>
</html>
*/?>