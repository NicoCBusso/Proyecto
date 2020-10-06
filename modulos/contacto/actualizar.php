<?php
require_once '../../class/Proveedor.php';
require_once '../../class/Usuario.php';
require_once '../../class/Empleado.php';
require_once '../../class/Contacto.php';
$id = $_GET ['id_contacto'];
$idPersona = $_GET['id_persona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];
$contacto = Contacto::obtenerPorId($id);
$listadoTipoContacto = TipoContacto::obtenerTodos();
//highlight_string(var_export($contacto,true));
//exit;
//$listadoLocalidad = Localidad::obtenerTodos();
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script src="../../js/validaciones/validarContacto.js"></script>	
<title>Actualizar Contacto</title>
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
									<h2>Agregar Contacto <small></small></h2>
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
										<input type="hidden" name="txtIdContacto" value='<?php echo $id ?>'>
										<input type="hidden" name="txtIdPersona" value='<?php echo $idPersona ?>'>
									    <input type="hidden" name="txtIdLlamada" value='<?php echo $idLlamada ?>'>
									    <input type="hidden" name="txtModulo" value='<?php echo $moduloLlamada ?>'>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Descripcion <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="txtNombre" required="required" class="form-control" name="txtNombre" value="<?php echo $contacto->getValor(); ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="envase">Tipo de Contacto <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboTipoContacto" id="cboTipoContacto" class="form-control">
													<option value="0">Seleccionar</option>
													<?php foreach ($listadoTipoContacto as $tipoContacto): ?>
														<option value="<?php echo $tipoContacto->getIdTipoContacto();?>"><?php echo $tipoContacto->getDescripcion()?></option>
													<?php endforeach ?>		
												</select>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="../<?php echo $moduloLlamada ?>/detalle.php?id=<?php echo $idLlamada ?>" role="button" class="btn btn-primary">Cancelar</a>
												<button class="btn btn-primary" type="reset">Borrar</button>
												<input type="button" value="Guardar" class="btn btn-success" onclick="validar();" >											
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