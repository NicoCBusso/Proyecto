<?php
require_once "../../../class/SubCategoria.php";
session_start();
$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$categoria = $_POST['cboCategoria'];
$categoriaVer = $_POST['idCategoriaVer'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Username
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id&idCategoria=$categoriaVer");
		exit;
	} elseif (strlen(trim($nombre)) < 6) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener al menos 6 caracteres";
		header("location: ../actualizar.php?id=$id&idCategoria=$categoriaVer");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 50 caracteres";
		header("location: ../actualizar.php?id=$id&idCategoria=$categoriaVer");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El Nombre debe ser identificado solamente con letras";
		header("location: ../actualizar.php?id=$id&idCategoria=$categoriaVer");
		exit;
	}
	//De Categoria
	if ((int) $categoria == 0) {
		$_SESSION['mensaje_error'] = "El campo Categoria debe ser seleccionado";
		header("location: ../actualizar.php?id=$id&idCategoria=$categoriaVer");
		exit;
	}		
}

$subcategoria = SubCategoria::obtenerPorId($id);
$subcategoria->setNombre($nombre);
$subcategoria->setIdCategoria($categoria);
$subcategoria->actualizar();

header("location: ../listado.php?id=$categoriaVer");

?>