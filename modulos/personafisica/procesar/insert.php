<?php 
require_once "../../../class/PersonaFisica.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDNI'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$genero = $_POST['cboSexo'];

if (empty(trim($nombre))) {
	echo "ERROR Nombre vacio";
	exit;
}
$personafisica = new PersonaFisica ($nombre,$apellido);
$personafisica->setDni($dni);
$personafisica->setFechaNacimiento($fechaNacimiento);
$personafisica->setSexo($genero);


$personafisica->guardar();

header("location: ../listado.php");
?>