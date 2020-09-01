<?php 
require_once '../../../class/Modulo.php';
session_start();
$nombre = $_POST['txtNombre'];
$directorio = $_POST['txtDirectorio'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Nombre
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) < 6) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener al menos 6 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 50 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El Nombre debe ser identificado con letras y numeros";
		header("location: ../alta.php");
		exit;
	}
	//De Directorio
	if (empty(trim($directorio))) {
		$_SESSION['mensaje_error'] = "El campo Directorio no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($directorio)) < 6) {
		$_SESSION['mensaje_error'] = "El campo Directorio debe contener al menos 6 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($directorio)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Directorio debe contener menos 50 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($directorio)) {
		$_SESSION['mensaje_error'] = "El Directorio debe ser identificado solo con letras";
		header("location: ../alta.php");
		exit;
	}
}
$modulo = new Modulo ($nombre,$directorio);
$modulo->guardar();


header("location: ../listado.php");
?>