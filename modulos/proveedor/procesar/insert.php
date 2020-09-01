 <?php 
require_once "../../../class/Proveedor.php";
require_once "../../../class/Direccion.php";
session_start();
$razonsocial = $_POST['txtRazonSocial'];
$cuit = $_POST['txtCuit'];
//$localidad = $_POST['txtLocalidad'];
//$direccion = $_POST['txtDireccion'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De RAZON SOCIAL
	if (empty(trim($razonsocial))) {
		$_SESSION['mensaje_error'] = "El campo Razon Social no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($razonsocial)) < 4) {
		$_SESSION['mensaje_error'] = "El campo Razon Social debe contener al menos 4 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($razonsocial)) > 101) {
		$_SESSION['mensaje_error'] = "El campo Razon Social debe contener menos 100 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($razonsocial)) {
		$_SESSION['mensaje_error'] = "El razonsocial debe ser identificado sin numeros";
		header("location: ../alta.php");
		exit;
	}
	//De CUIT
	if (empty(trim($cuit))) {
		$_SESSION['mensaje_error'] = "El campo cuit no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($cuit)) != 11) {
		$_SESSION['mensaje_error'] = "El campo cuit debe contener 11 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (!is_numeric($cuit)) {
		$_SESSION['mensaje_error'] = "El cuit debe ser identificado con numeros";
		header("location: ../alta.php");
		exit;
	}
	
}
$proveedor = new proveedor ($razonsocial);
$proveedor->setCuit($cuit);
//$proveedor->setDireccion($direccion);


$proveedor->guardar();
header("location: ../listado.php");
?>