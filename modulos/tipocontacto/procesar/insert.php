<?php 
require_once '../../../class/TipoContacto.php';
session_start();
$nombre = $_POST['txtNombre'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Nombre
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) < 3) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener al menos 4 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) > 100) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 50 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El Nombre debe ser identificado con letras";
		header("location: ../alta.php");
		exit;
	}
}
$tipoContacto = new TipoContacto ($nombre);
$tipoContacto->guardar();


header("location: ../listado.php");
?>