<?php 
require_once "../../../class/Trago.php";
require_once "../../../class/Producto.php";
session_start();
$nombre = $_POST['txtNombre'];
$precioVenta = $_POST['txtPrecioVenta'];
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
	} elseif (strlen(trim($nombre)) > 101) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 100 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El Nombre debe ser identificado con letras y numeros";
		header("location: ../alta.php");
		exit;
	}
	//De PrecioVenta
	if (empty(trim($precioVenta))) {
		$_SESSION['mensaje_error'] = "El campo Precio Venta no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (!is_numeric($precioVenta)) {
		$_SESSION['mensaje_error'] = "El Precio Venta debe ser identificado con solo numeros";
		header("location: ../alta.php");
		exit;
	}
}
$trago = new Trago($nombre);
$trago->setPrecioVenta($precioVenta);
$trago->guardar();	
//highlight_string(var_export($trago,true));
header("location: ../listado.php");
?>