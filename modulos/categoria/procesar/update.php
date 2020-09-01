<?php
require_once "../../../class/Categoria.php";
session_start();
$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Username
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) < 6) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener al menos 6 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 50 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El Nombre debe ser identificado solamente con letras";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
}
$categoria = Categoria::obtenerPorId($id);
$categoria->setNombre($nombre);
$categoria->actualizar();

header("location: ../listado.php");

?>