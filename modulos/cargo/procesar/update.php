<?php
require_once '../../../class/Cargo.php';
session_start();
$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) < 4) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener al menos 4 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 50 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El nombre debe ser identificado sin numeros";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
}
$cargo = Cargo::obtenerPorId($id);
$cargo->setNombre($nombre);
$cargo->actualizar();


header("location: ../listado.php");

?>