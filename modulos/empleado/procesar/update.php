<?php
require_once "../../../class/Empleado.php";
session_start();
$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$genero = $_POST['cboSexo'];
$cargo = $_POST['cboCargo'];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De NOMBRE
	if (empty(trim($nombre))) {
		$_SESSION['mensaje_error'] = "El campo Nombre no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) < 3) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener al menos 3 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($nombre)) > 101) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 100 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El nombre debe ser identificado sin numeros";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
	//De APELLIDO
	if (empty(trim($apellido))) {
		$_SESSION['mensaje_error'] = "El campo apellido no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($apellido)) < 3) {
		$_SESSION['mensaje_error'] = "El campo apellido debe contener al menos 3 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($apellido)) > 101) {
		$_SESSION['mensaje_error'] = "El campo apellido debe contener menos 100 caracteres";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (is_numeric($apellido)) {
		$_SESSION['mensaje_error'] = "El apellido debe ser identificado sin numeros";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
	//De Fecha Nacimiento
	
	$fechaNacimientoComparar = new DateTime ($fechaNacimiento);
	$fechaActual = new DateTime();
	$diferencia = $fechaActual->diff($fechaNacimientoComparar);
	//highlight_string(var_export($diferencia,true));
	$edad = $diferencia->y;
	//highlight_string(var_export($edad,true));
	//echo $edad;

	if ($edad < 18) {
		$_SESSION['mensaje_error'] = "El empleado es menor de edad, edad: ".$edad;
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	}
	if ($edad > 120) {
		$_SESSION['mensaje_error'] = "El empleado es muy viejo para trabajar, edad: ".$edad;
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	}
	//De DNI
	if (empty(trim($dni))) {
		$_SESSION['mensaje_error'] = "El campo dni no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (!is_numeric($dni)) {
		$_SESSION['mensaje_error'] = "El dni debe ser identificado con solo numeros";
		header("location: ../actualizar.php?id=$id");
		exit;
	} elseif (strlen(trim($dni)) != 8) {
		$_SESSION['mensaje_error'] = "El campo dni debe contener 8 digitos, sin punto y agregar 0 en caso de valor menor 10 millones";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
	//De Sexo
	if ((int) $genero != 1 and (int) $genero != 2) {
		$_SESSION['mensaje_error'] = "El campo Sexo debe ser seleccionado";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
	//De Cargo
	if ((int) $cargo == 0) {
		$_SESSION['mensaje_error'] = "El campo Cargo debe ser seleccionado";
		header("location: ../actualizar.php?id=$id");
		exit;
	}
}
$empleado = Empleado::obtenerPorId($id);
$empleado->setNombre($nombre);
$empleado->setApellido($apellido);
$empleado->setDni($dni);
$empleado->setFechaNacimiento($fechaNacimiento);
$empleado->setSexo($genero);
$empleado->setIdCargo($cargo);
highlight_string(var_export($empleado,true));
$empleado->actualizar();

header("location: ../listado.php");

?>