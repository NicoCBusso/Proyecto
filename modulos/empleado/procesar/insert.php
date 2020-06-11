<?php 
require_once "../../../class/Empleado.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDNI'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$genero = $_POST['cboSexo'];
$cargo = $_POST['cboCargo'];

if (empty(trim($nombre))) {
	echo "ERROR Nombre vacio";
	exit;
}
$empleado = new Empleado ($nombre,$apellido);
$empleado->setDni($dni);
$empleado->setFechaNacimiento($fechaNacimiento);
$empleado->setSexo($genero);
$empleado->setCargo($cargo);

$empleado->guardar();

header("location: ../listadoEmpleado.php");
?>