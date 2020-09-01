<?php 
require_once '../../../class/Cargo.php';

session_start();
$nombre = $_POST['txtNombre'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) < 4) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener al menos 4 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 50 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El nombre debe ser identificado sin numeros";
		header("location: ../alta.php");
		exit;
	}
}
$cargo = new Cargo ($nombre);
$cargo->guardar();


header("location: ../listado.php");
?>
