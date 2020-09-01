<?php 
require_once "../../../class/Provincia.php";
session_start();
$nombre = $_POST['txtNombre'];
$pais = $_POST['cboPais'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Provincia
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Provincia no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) < 3) {
		$_SESSION['mensaje_error'] = "El campo Provincia debe contener al menos 3 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Provincia debe contener menos 50 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El campo Provincia debe ser identificado con letras";
		header("location: ../alta.php");
		exit;
	}
	//De Perfil
	if ((int) $pais == 0) {
		$_SESSION['mensaje_error'] = "El campo Pais debe ser seleccionado";
		header("location: ../alta.php");
		exit;
	}	
}
$provincia = new Provincia ($nombre);
$provincia->setIdPais($pais);

$provincia->guardar();

header("location: ../listado.php");
?>