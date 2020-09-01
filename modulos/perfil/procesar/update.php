<?php
require_once "../../../class/Perfil.php";
require_once '../../../class/PerfilModulo.php';
session_start();
$idPerfil = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$listaModulos = $_POST['cboModulos'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Perfil
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Perfil no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$idPerfil");
		exit;
	} elseif (strlen(trim($nombre)) < 3) {
		$_SESSION['mensaje_error'] = "El campo Perfil debe contener al menos 3 caracteres";
		header("location: ../actualizar.php?id=$idPerfil");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Perfil debe contener menos 50 caracteres";
		header("location: ../actualizar.php?id=$idPerfil");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El campo Perfil debe ser identificado con letras";
		header("location: ../actualizar.php?id=$idPerfil");
		exit;
	}
	//De Modulos
	if (empty($listaModulos)) {
		$_SESSION['mensaje_error'] = "La lista de Modulos no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$idPerfil");
		exit;
	}
}
$perfil = Perfil::obtenerPorId($idPerfil);
$perfil->setDescripcion($nombre);
$perfil->actualizar();

$perfil->eliminarModulos();

foreach ($listaModulos as $modulo_id) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdPerfil($perfil->getIdPerfil());
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->guardar();
}

header("location: ../listado.php");

?>