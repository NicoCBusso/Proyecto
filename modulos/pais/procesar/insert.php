<?php 
require_once "../../../class/Pais.php";
session_start();
$nombre = $_POST['txtNombre'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De RAZON SOCIAL
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo pais no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) < 4) {
		$_SESSION['mensaje_error'] = "El campo pais debe contener al menos 4 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo pais debe contener menos 100 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El campo pais debe ser identificado sin numeros";
		header("location: ../alta.php");
		exit;
	}
}
$pais = new Pais ($nombre);
$pais->guardar();

header("location: ../listado.php");
?>