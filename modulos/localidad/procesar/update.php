<?php
require_once "../../../class/Localidad.php";
session_start();
$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$provincia = $_POST['cboProvincia'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Localidad
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Localidad no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) < 3) {
		$_SESSION['mensaje_error'] = "El campo Localidad debe contener al menos 3 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) > 101) {
		$_SESSION['mensaje_error'] = "El campo Localidad debe contener menos 100 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El campo Localidad debe ser identificado con letras";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
	//De Provincia
	if ((int) $provincia == 0) {
		$_SESSION['mensaje_error'] = "El campo Provincia debe ser seleccionado";
		header("location: ../actualizar.php?id=$id");
		exit;
	}	
}
$localidad = Localidad::obtenerPorId($id);
$localidad->setDescripcion($nombre);
$localidad->setIdProvincia($provincia);
$localidad->actualizar();
//highlight_string(var_export($localidad,true));
header("location: ../listado.php");

?>