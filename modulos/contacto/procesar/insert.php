<?php
session_start();
require_once "../../../class/Contacto.php";;

$idPersona = $_POST['txtIdPersona'];
$idLlamada = $_POST['txtIdLlamada'];
$modulo = $_POST['txtModulo'];
$valor = $_POST['txtNombre'];
$tipoContacto = $_POST['cboTipoContacto'];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	//De Localidad
	if ((int) $tipoContacto == 0) {
		$_SESSION['mensaje_error'] = "El campo Tipo de Contacto debe ser seleccionado";
		header("location: ../alta.php?id_persona=$idPersona&idLlamada=$idLlamada&modulo=$modulo");
		exit;
	}
	//De CALLE
	if (empty(trim($valor))) {
		$_SESSION['mensaje_error'] = "El campo Descripcion no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php?id_persona=$idPersona&idLlamada=$idLlamada&modulo=$modulo");
		exit;
	}
	
}

$contacto = new Contacto();
$contacto->setIdTipoContacto($tipoContacto);
$contacto->setValor($valor);
$contacto->setIdPersona($idPersona);

$contacto->guardar();

// redireccionar



header("location: /programacion3/Proyecto/modulos/$modulo/detalle.php?id=$idLlamada");
?>