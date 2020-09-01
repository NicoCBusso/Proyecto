<?php 
require_once "../../../class/Marca.php";
session_start();
$nombre = $_POST['txtNombre'];

//Validaciones
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Marca no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) < 2) {
		$_SESSION['mensaje_error'] = "El campo Marca debe contener al menos 2 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Marca debe contener menos 50 caracteres";
		header("location: ../alta.php");
		exit;
	} 
}
$marca = new Marca ($nombre);
$marca->guardar();

header("location: ../listado.php");
?>