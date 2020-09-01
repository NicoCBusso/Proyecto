<?php 
require_once "../../../class/Trago.php";
session_start();
$idTrago = $_POST['idTrago'];
$nombre = $_POST['txtNombre'];
$precioVenta = $_POST['txtPrecioVenta'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Nombre
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$idTrago");
		exit;
	} elseif (strlen(trim($nombre)) < 6) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener al menos 6 caracteres";
		header("location: ../actualizar.php?id=$idTrago");
		exit;
	} elseif (strlen(trim($nombre)) > 101) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 100 caracteres";
		header("location: ../actualizar.php?id=$idTrago");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El Nombre debe ser identificado con letras y numeros";
		header("location: ../actualizar.php?id=$idTrago");
		exit;
	}
	//De PrecioVenta
	if (empty(trim($precioVenta))) {
		$_SESSION['mensaje_error'] = "El campo Precio Venta no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$idTrago");
		exit;
	} elseif (!is_numeric($precioVenta)) {
		$_SESSION['mensaje_error'] = "El Precio Venta debe ser identificado con solo numeros";
		header("location: ../actualizar.php?id=$idTrago");
		exit;
	}
}
$trago = Trago::obtenerPorId($idTrago);
$trago->setNombre($nombre);
$trago->setPrecioVenta($precioVenta);
$trago->actualizar();	
//highlight_string(var_export($trago,true));
header("location: ../listado.php");
?>