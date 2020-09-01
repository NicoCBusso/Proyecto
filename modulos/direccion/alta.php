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

	<title>Alta de direccion</title>
</head>
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



