<?php 
require_once '../../../class/SubCategoria.php';
session_start();
$nombre = $_POST['txtNombre'];
$categoria = $_POST['id'];
$categoriaVer = $_POST['idCategoriaVer'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Username
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php?id=$categoria");
		exit;
	} elseif (strlen(trim($nombre)) < 6) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener al menos 6 caracteres";
		header("location: ../alta.php?id=$categoria");
		exit;
	} elseif (strlen(trim($nombre)) > 51) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 50 caracteres";
		header("location: ../alta.php?id=$categoria");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El Nombre debe ser identificado solamente con letras";
		header("location: ../alta.php?id=$categoria");
		exit;
	}
}
$subcategoria = new SubCategoria($nombre);
$subcategoria->setIdCategoria($categoria);
$subcategoria->guardar();
highlight_string(var_export($subcategoria,true));
header("location: ../listado.php?id=$categoriaVer");
?>