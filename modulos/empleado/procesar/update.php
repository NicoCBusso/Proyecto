<?php
require_once "../../../class/Empleado.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$sexo = $_POST['cboSexo'];
$cargo = $_POST['cboCargo'];


if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}

$empleado = Empleado::obtenerPorId($id);
$empleado->setNombre($nombre);
$empleado->setApellido($apellido);
$empleado->setDni($dni);
$empleado->setFechaNacimiento($fechaNacimiento);
$empleado->setSexo($sexo);
$empleado->setCargo($cargo);
$empleado->actualizar();

header("location: ../listadoEmpleado.php");

?>