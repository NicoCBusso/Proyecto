<?php
require_once "../../../class/Proveedor.php";
session_start();
$id = $_POST['txtId'];
$razonsocial = $_POST['txtRazonSocial'];
$cuit = $_POST['txtCuit'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De RAZON SOCIAL
	if (empty(trim($razonsocial))) {
		$_SESSION['mensaje_error'] = "El campo Razon Social no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($razonsocial)) < 4) {
		$_SESSION['mensaje_error'] = "El campo Razon Social debe contener al menos 4 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($razonsocial)) > 101) {
		$_SESSION['mensaje_error'] = "El campo Razon Social debe contener menos 100 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (is_numeric($razonsocial)) {
		$_SESSION['mensaje_error'] = "El razonsocial debe ser identificado sin numeros";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
	//De CUIT
	if (empty(trim($cuit))) {
		$_SESSION['mensaje_error'] = "El campo cuit no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($cuit)) != 11) {
		$_SESSION['mensaje_error'] = "El campo cuit debe contener 11 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (!is_numeric($cuit)) {
		$_SESSION['mensaje_error'] = "El cuit debe ser identificado con numeros";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
	
}

$proveedor = Proveedor::obtenerPorId($id);
$proveedor->setRazonSocial($razonsocial);
$proveedor->setCuit($cuit);

$proveedor->actualizar();
//highlight_string(var_export($proveedor,true));
header("location: ../listado.php");

?>