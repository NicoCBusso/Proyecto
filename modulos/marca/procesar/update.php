<?php
require_once "../../../class/Marca.php";
session_start();
$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) < 2) {
		$_SESSION['mensaje_error'] = "El campo nombre debe contener al menos 2 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo nombre debe contener menos 50 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
}
$marca = Marca::obtenerPorId($id);
$marca->setNombre($nombre);
$marca->actualizar();

header("location: ../listado.php");

?>