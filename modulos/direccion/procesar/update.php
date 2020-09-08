<?php
session_start();
require_once "../../../class/Direccion.php";;
$idPersona = $_POST['txtIdPersona'];
$idLlamada = $_POST['txtIdLlamada'];
$localidad = $_POST['cboLocalidad'];
//highlight_string(var_export($localidad,true));
$modulo = $_POST['txtModulo'];
$calle = $_POST['txtCalle'];
$numero = $_POST['txtNumero'];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	//De Localidad
	if ((int) $localidad == 0) {
		$_SESSION['mensaje_error'] = "El campo Localidad debe ser seleccionado";
		header("location: ../actualizar.php?id_persona=$idPersona&idLlamada=$idLlamada&modulo=$modulo&id_direccion=$id");
		exit;
	}
	//De CALLE
	if (empty(trim($calle))) {
		$_SESSION['mensaje_error'] = "El campo Calle no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id_persona=$idPersona&idLlamada=$idLlamada&modulo=$modulo&id_direccion=$id");
		exit;
	} elseif (strlen(trim($calle)) < 4) {
		$_SESSION['mensaje_error'] = "El campo Calle debe contener al menos 4 caracteres";
		header("location: ../actualizar.php?id_persona=$idPersona&idLlamada=$idLlamada&modulo=$modulo&id_direccion=$id");
		exit;
	} elseif (strlen(trim($calle)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Calle debe contener menos 51 caracteres";
		header("location: ../actualizar.php?id_persona=$idPersona&idLlamada=$idLlamada&modulo=$modulo&id_direccion=$id");
		exit;
	} elseif (is_numeric($calle)) {
		$_SESSION['mensaje_error'] = "El calle debe ser identificado sin numeros";
		header("location: ../actualizar.php?id_persona=$idPersona&idLlamada=$idLlamada&modulo=$modulo&id_direccion=$id");
		exit;
	}

	//De NUMERO
	if (empty(trim($numero))) {
		$_SESSION['mensaje_error'] = "El campo numero no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php?id_persona=$idPersona&idLlamada=$idLlamada&modulo=$modulo&id_direccion=$id");
		exit;
	} elseif (!is_numeric($numero)) {
		$_SESSION['mensaje_error'] = "El numero debe ser identificado con solo numeros";
		header("location: ../actualizar.php?id_persona=$idPersona&idLlamada=$idLlamada&modulo=$modulo&id_direccion=$id");
		exit;
	} elseif (strlen(trim($numero)) > 5) {
		$_SESSION['mensaje_error'] = "El campo numero debe contener una Altura real";
		header("location: ../actualizar.php?id_persona=$idPersona&idLlamada=$idLlamada&modulo=$modulo&id_direccion=$id");
		exit;
	}
	
}
$direccion = Direccion::obtenerPorIdPersona($idPersona);;
$direccion->setIdLocalidad($localidad);
$direccion->setCalle($calle);
$direccion->setNumero($numero);
$direccion->setIdPersona($idPersona);
highlight_string(var_export($direccion,true));
$direccion->actualizar();

// redireccionar
//header("location: /programacion3/Proyecto/modulos/$modulo/detalle.php?id=$idLlamada");
