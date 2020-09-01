<?php
require_once "../../../class/Provincia.php";
session_start();
$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$pais = $_POST['cboPais'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Provincia
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Provincia no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) < 3) {
		$_SESSION['mensaje_error'] = "El campo Provincia debe contener al menos 3 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Provincia debe contener menos 50 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El campo Provincia debe ser identificado con letras";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
	//De Perfil
	if ((int) $pais == 0) {
		$_SESSION['mensaje_error'] = "El campo Pais debe ser seleccionado";
		header("location: ../actualizar.php?id=$id");
		exit;
	}	
}
$provincia = Provincia::obtenerPorId($id);
$provincia->setDescripcion($nombre);
$provincia->setIdPais($pais);
$provincia->actualizar();

header("location: ../listado.php");

?>