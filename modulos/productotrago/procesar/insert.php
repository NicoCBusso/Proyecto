<?php 
require_once '../../../class/ProductoTrago.php';
session_start();
$trago = $_POST['id'];
$tragoVer = $_POST['idTragoVer'];
$ingrediente = $_POST['cboProducto'];
$cantidad = $_POST['txtCantidad'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if ((int) $ingrediente == 0) {
		$_SESSION['mensaje_error'] = "El campo Ingrediente debe ser seleccionado";
		header("location: ../alta.php?id=$trago");
		exit;
	}	
	//De NOMBRE
	if (empty(trim($cantidad))) {
		$_SESSION['mensaje_error'] = "El campo Cantidad no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php?id=$trago");
		exit;
	} elseif (strlen(trim($cantidad)) < 2) {
		$_SESSION['mensaje_error'] = "El campo Cantidad debe contener al menos 2 caracteres";
		header("location: ../alta.php?id=$trago");
		exit;
	} elseif (strlen(trim($cantidad)) > 4) {
		$_SESSION['mensaje_error'] = "El campo Cantidad debe contener menos 5 caracteres";
		header("location: ../alta.php?id=$trago");
		exit;
	} elseif (!is_numeric($cantidad)) {
		$_SESSION['mensaje_error'] = "El campo Cantidad debe ser identificado numericamente";
		header("location: ../alta.php?id=$trago");
		exit;
	}
}
$productoTrago = new ProductoTrago($cantidad);
$productoTrago->setIdTrago($trago);
$productoTrago->setIdProducto($ingrediente);
$productoTrago->setCantidad($cantidad);

$productoTrago->guardar();
//highlight_string(var_export($productoTrago,true));

header("location: ../listado.php?id=$tragoVer");
?>