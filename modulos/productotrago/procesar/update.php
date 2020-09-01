<?php
require_once "../../../class/ProductoTrago.php";
session_start();
$idIngrediente = $_POST['idIngrediente'];
$idTrago = $_POST['idTrago'];
$ingrediente = $_POST['cboProducto'];
$tragoVer = $_POST['idTrago'];
$cantidad = $_POST['txtCantidad'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if ((int) $ingrediente == 0) {
		$_SESSION['mensaje_error'] = "El campo Ingrediente debe ser seleccionado";
		header("location: ../actualizar.php?id=$idIngrediente&idTrago=$idTrago");
		exit;
	}	
	//De NOMBRE
	if (empty(trim($cantidad))) {
		$_SESSION['mensaje_error'] = "El campo Cantidad no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$idIngrediente&idTrago=$idTrago");
		exit;
	} elseif (strlen(trim($cantidad)) < 1) {
		$_SESSION['mensaje_error'] = "El campo Cantidad debe contener al menos 2 caracteres";
		header("location: ../actualizar.php?id=$idIngrediente&idTrago=$idTrago");
		exit;
	} elseif (strlen(trim($cantidad)) > 4) {
		$_SESSION['mensaje_error'] = "El campo Cantidad debe contener menos 5 caracteres";
		header("location: ../actualizar.php?id=$idIngrediente&idTrago=$idTrago");
		exit;
	} elseif (!is_numeric($cantidad)) {
		$_SESSION['mensaje_error'] = "El campo Cantidad debe ser identificado numericamente";
		header("location: ../actualizar.php?id=$idIngrediente&idTrago=$idTrago");
		exit;
	}
}
$productoTrago = ProductoTrago::obtenerPorId($idIngrediente);
$productoTrago->setIdProducto($ingrediente);
$productoTrago->setCantidad($cantidad);
$productoTrago->actualizar();

header("location: ../listado.php?id=$idTrago");

?>