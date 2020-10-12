<?php
require_once "../../../class/Puesto.php";
session_start();
$id = $_POST['txtId'];
$lugar = $_POST['txtLugar'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Username
	if (empty(trim($lugar))) {
		$_SESSION['mensaje_error'] = "El campo Lugar no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($lugar)) < 6) {
		$_SESSION['mensaje_error'] = "El campo Lugar debe contener al menos 6 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($lugar)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Lugar debe contener menos 50 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (is_numeric($lugar)) {
		$_SESSION['mensaje_error'] = "El Lugar debe ser identificado solamente con letras";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
}
$puesto = Puesto::obtenerPorId($id);
$puesto->setLugar($lugar);
$puesto->actualizar();

header("location: ../listado.php");

?>