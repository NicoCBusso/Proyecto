<?php
require_once '../../class/Usuario.php';

$idPersona = $_GET['id_persona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];
$listadoPais = Pais::obtenerTodos();
$listadoLocalidad = Localidad::obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script src="../../js/validaciones/validarDireccion.js"></script>
	<script type="text/javascript">
		function cargarProvincias(){
			var idPais = $("#cboPais").val();

			var params = {id: idPais};

			$.get("obtenerProvincias.php", params, function(datos){

				$("#cboProvincia").html(datos);
			});
		}
		function cargarLocalidad(){
			var idProvincia = $("#cboProvincia").val();

			var params = {id: idProvincia};

			$.get("obtenerLocalidad.php", params, function(datos){

				$("#cboLocalidad").html(datos);
			});
		}
	</script>

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
									<h2>Agregar Direccion <small></small></h2>
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
										<input type="hidden" name="txtIdPersona" value='<?php echo $idPersona ?>'>
									    <input type="hidden" name="txtIdLlamada" value='<?php echo $idLlamada ?>'>
									    <input type="hidden" name="txtModulo" value='<?php echo $moduloLlamada ?>'>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="pais">Pais <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboPais" id="cboPais" onchange="cargarProvincias();" class="form-control">
													<option value="0">Seleccionar</option>
													<?php foreach ($listadoPais as $pais): ?>		
														<option value="<?php echo $pais->getIdPais(); ?>"><?php echo $pais->getDescripcion(); ?></option> 			
													<?php endforeach ?>		
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="provincia">Provincia <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboProvincia" id="cboProvincia" onchange="cargarLocalidad();" class="form-control">
													<option value="0">Seleccionar</option>														
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="localidad">Localidad <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboLocalidad" id="cboLocalidad" class="form-control">
													<option value="0">Seleccionar</option>													
												</select>
											</div>
										</div>										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="calle">Calle <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="txtCalle" name="txtCalle" required="required" class="form-control" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="altura">Altura <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="txtNumero" required="required" class="form-control" name="txtNumero" >
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



<?php /*
<body>
	<p align="center"><?php require_once"../../menu.php"; ?></p>
	<form name="frmDatos" method="POST" id="frmDatos" action="procesar/insert.php">
	<?php if (isset($_SESSION['mensaje_error'])) :?>
		<h3><font color="red">
			<?php
				echo $_SESSION['mensaje_error']; 
		        unset($_SESSION['mensaje_error']);
		    ?>
	    </font></h3>
    <?php endif;?>		
		<fieldset>
			<legend>IDs</legend>
				<input type="hidden" name="txtIdPersona" value='<?php echo $idPersona ?>'>
			    <input type="hidden" name="txtIdLlamada" value='<?php echo $idLlamada ?>'>
			    <input type="hidden" name="txtModulo" value='<?php echo $moduloLlamada ?>'>
		</fieldset>
		<fieldset>
			<legend>Ubicacion</legend>

			<p><label>Pais :<select name="cboPais" id="cboPais" onchange="cargarProvincias();"></label></p>
				<option value="0">Seleccionar</option>
				<?php foreach ($listadoPais as $pais): ?>		
				<option value="<?php echo $pais->getIdPais(); ?>"><?php echo $pais->getDescripcion(); ?></option> 			
				<?php endforeach ?>			
			</select></label></p>
			<p><label>Provincia :<select name="cboProvincia" id="cboProvincia" onchange="cargarLocalidad();"></label></p>		
				<option value="0">Seleccionar</option> 				
			</select></label></p>

			<p><label>Localidad :<select name="cboLocalidad" id="cboLocalidad"></label></p>				
				<option value="0">Seleccionar</option> 		
			</select></label></p>
		</fieldset>
		<fieldset>
			<legend>Direccion</legend>
			<p><label>Calle: <input type="text" id="txtCalle" name="txtCalle"></label></p>
			<p><label>Numero: <input type="text" id="txtNumero" name="txtNumero"></label></p>
			
			<input type="button" value="Guardar" onclick="validar();">
		</fieldset>
		<a href="../<?php echo $moduloLlamada ?>/detalle.php?id=<?php echo $idLlamada ?>"  role="button">Atras</a> 
	</form>
</body>
</html>
*/?>


