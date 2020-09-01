<?php
require_once '../../class/Proveedor.php';
require_once '../../class/Usuario.php';
require_once '../../class/Empleado.php';
$id = $_GET ['id_direccion'];
$idPersona = $_GET['id_persona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];
$direccion = Direccion::obtenerPorIdPersona($idPersona);
//highlight_string(var_export($direccion,true));
$listadoPais = Pais::obtenerTodos();
//$listadoLocalidad = Localidad::obtenerTodos();
?>
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
<title>Actualizar Direccion</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

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
				<input type="hidden" name="txtId" value='<?php echo $id ?>'>
				<input type="hidden" name="txtIdPersona" value='<?php echo $idPersona ?>'>
			    <input type="hidden" name="txtIdLlamada" value='<?php echo $idLlamada ?>'>
			    <input type="hidden" name="txtModulo" value='<?php echo $moduloLlamada ?>'>
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
		<br>
		<fieldset>		    
			<p><label>Calle: <input type="text" name="txtCalle" id="txtCalle" value="<?php echo $direccion->getCalle(); ?>"></label></p>
			<p><label>Numero: <input type="text" name="txtNumero" id="txtNumero" value="<?php echo $direccion->getNumero(); ?>"></label></p>		
			<input type="button" value="Actualizar" onclick="validar();">
		</fieldset>

		<a href="../<?php echo $moduloLlamada ?>/detalle.php?id=<?php echo $idLlamada ?>"  role="button">Atras</a> 
	</form>
</body>
</html>
