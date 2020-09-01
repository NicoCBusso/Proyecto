<?php

require_once "../../../class/Usuario.php";

$username = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];

$usuario = Usuario::login($username, $password);

if ($usuario->estaLogueado()) {
	session_start();
	$_SESSION['usuario'] = $usuario;
	header("location: ../../../dashboard.php");
} else {
	header("location: ../../../formulario_login.php");
}



?>