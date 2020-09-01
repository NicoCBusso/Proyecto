<?php
require_once "../../../class/Producto.php";
session_start();

$nombre = $_POST['txtNombre'];
$codigoBarra = $_POST['txtCodigoBarra'];
$contenido = $_POST['txtContenido'];
$precioCompra = $_POST['txtPrecioCompra'];
$precioVenta = $_POST['txtPrecioVenta'];
$envase = $_POST['cboEnvase'];
$marca = $_POST['cboMarca'];
$subcategoria = $_POST['cboSubCategoria'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De NOMBRE
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) < 4) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener al menos 4 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($nombre)) > 100) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 100 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El nombre debe ser identificado sin numeros";
		header("location: ../alta.php");
		exit;
	}
	//De CODIGO BARRA
	if (empty(trim($codigoBarra))) {
		$_SESSION['mensaje_error'] = "El campo Codigo Barra no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (!is_numeric($codigoBarra)) {
		$_SESSION['mensaje_error'] = "El Codigo Barra debe ser identificado con solo numeros";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($codigoBarra)) != 10) {
		$_SESSION['mensaje_error'] = "El campo Codigo Barra debe contener 10 digitos, sin punto.";
		header("location: ../alta.php");
		exit;
	}
	//De CONTENIDO
	if (empty(trim($contenido))) {
		$_SESSION['mensaje_error'] = "El campo Contenido no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (!is_numeric($contenido)) {
		$_SESSION['mensaje_error'] = "El Contenido debe ser identificado con solo numeros";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($contenido)) < 3) {
		$_SESSION['mensaje_error'] = "El campo Contenido debe mas de 3 digitos";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($contenido)) > 4) {
		$_SESSION['mensaje_error'] = "El campo Contenido debe tener menos de 5 digitos";
		header("location: ../alta.php");
		exit;
	}
	//De PrecioCompra
	if (!is_numeric($precioCompra)) {
		$_SESSION['mensaje_error'] = "El Precio Compra debe ser identificado con solo numeros";
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
	//De  ENVASE
	if ((int) $envase == 0) {
		$_SESSION['mensaje_error'] = "El campo Envase debe ser seleccionado";
		header("location: ../alta.php");
		exit;
	}
	//De Marca
	if ((int) $marca == 0) {
		$_SESSION['mensaje_error'] = "El campo Marca debe ser seleccionado";
		header("location: ../alta.php");
		exit;
	}
	//De SubCategoria
	if ((int) $subcategoria == 0) {
		$_SESSION['mensaje_error'] = "El campo SubCategoria debe ser seleccionado";
		header("location: ../alta.php");
		exit;
	}					
}

$producto = new Producto($nombre);
$producto->setCodigoBarra($codigoBarra);
$producto->setContenido($contenido);
$producto->setPrecioCompra($precioCompra);
$producto->setPrecioVenta($precioVenta);
$producto->setIdMarca($marca);
$producto->setIdEnvase($envase);
$producto->setIdSubCategoria($subcategoria);
$producto->guardar();
highlight_string(var_export($producto,true));
//header("location: ../listado.php");
?>