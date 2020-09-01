<?php
require_once "../../../class/PersonaFisica.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$sexo = $_POST['cboSexo'];


if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}

$personaFisica = PersonaFisica::obtenerPorId($id);
$personaFisica->setNombre($nombre);
$personaFisica->setApellido($apellido);
$personaFisica->setDni($dni);
$personaFisica->setFechaNacimiento($fechaNacimiento);
$personaFisica->setSexo($sexo);

$personaFisica->actualizar();

header("location: ../listadoPersonaFisica.php");

?>