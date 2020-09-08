<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once '../../class/Usuario.php';
$id = $_GET ['id'];

$usuario = Usuario::obtenerPorId($id);
$listadoPerfil = Perfil::obtenerTodos();
//highlight_string(var_export($usuario,true));
?>
<html>
<head>
	<script src="../../js/validaciones/validarUsuario.js"></script>
	<title>Actualizar Usuario</title>
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
									<h2>Actualizar Usuario <small></small></h2>
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
									<form  data-parsley-validate class="form-horizontal form-label-left" name="frmDatos" id="frmDatos" method="POST" action="procesar/update.php" enctype="multipart/form-data">
										<input type="hidden" name="txtId" value="<?php echo $usuario->getIdUsuario(); ?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" required="required" class="form-control" name="txtUsername" id="txtUsername" value="<?php echo $usuario->getUsername(); ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" required="required" class="form-control" name="txtPassword" id="txtPassword" value="<?php echo $usuario->getPassword(); ?>">
											</div>
										</div>	
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombre <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" required="required" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $usuario->getNombre(); ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="apellido">Apellido <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" required="required" class="form-control" name="txtApellido" id="txtApellido" value="<?php echo $usuario->getApellido(); ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="dni">DNI <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" required="required" class="form-control" name="txtDni" id="txtDni" maxlength="8" value="<?php echo $usuario->getDni(); ?>">
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
												<input id="txtFechaNacimiento" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="txtFechaNacimiento" value="<?php echo $usuario->getFechaNacimiento(); ?>">
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="perfil">Perfil <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="cboPerfil" id="cboPerfil" class="form-control">
													<option value="0">Seleccionar</option>
													<?php foreach ($listadoPerfil as $perfil): ?>
														<option value="<?php echo $perfil->getIdPerfil();?>"><?php echo $perfil->getDescripcion()?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="dni">Imagen <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" required="required" class="form-control" name="fileImagen" id="fileImagen" maxlength="8" value="<?php echo $usuario->getAvatar();?>">
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
	<?php if (isset($_SESSION['mensaje_error'])) :?>
		<h3><font color="red">
			<?php
				echo $_SESSION['mensaje_error']; 
		        unset($_SESSION['mensaje_error']);
		    ?>
	    </font></h3>
    <?php endif;?>	
	<form name="frmDatos" id="frmDatos" method="POST" action="procesar/update.php">
		<p>Acuerdese de actualizar todos los datos</p>
		<fieldset>
			<legend>Actualizar datos</legend>
			<label for="txtId"></label>	<input type="hidden" name="txtId" value="<?php echo $usuario->getIdUsuario(); ?>">
			<input type="hidden" name="txtUsername" id="txtUsername" value="<?php echo $usuario->getUsername(); ?>">
			<p><label>Password: <input type="password" id="txtPassword" name="txtPassword" value="<?php echo $usuario->getPassword(); ?>"></label></p>
			<p><label>Perfil: <select id="cboPerfil" name="cboPerfil">
				<option value="0">Seleccionar</option>
				<?php foreach ($listadoPerfil as $perfil): ?>
					<option value="<?php echo $perfil->getIdPerfil();?>"><?php echo $perfil->getDescripcion()?></option>
				<?php endforeach ?>
			</select></label></p>
			<p><label>Nombre: <input type="text" id="txtNombre" name="txtNombre" value="<?php echo $usuario->getNombre(); ?>"></label></p>
			<p><label>Apellido: <input type="text" id="txtApellido" name="txtApellido" value="<?php echo $usuario->getApellido(); ?>"></label></p>
			<p><label>Fecha de nacimiento: <input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento" value="<?php echo $usuario->getFechaNacimiento(); ?>"></label></p>
			<p><label>DNI: <input type="text" id="txtDni" name="txtDni" value="<?php echo $usuario->getDni(); ?>"></label></p>
			<p><label>Sexo: <select id="cboSexo" name="cboSexo">
				<option value="0">Seleccionar</option>
				<option value="1">Masculino</option>
				<option value="2">Femenino</option>
			</select></label></p>
			<input type="button" value="Guardar" onclick="validar();">	</fieldset>
		</fieldset>
	</form>
	<a href="listado.php" role="button">Cancelar</a>
</body>
</html>
*/?>