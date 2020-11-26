<?php
require_once "../../../class/Usuario.php";
session_start();
$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];
$perfil = $_POST['cboPerfil'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$genero = $_POST['cboSexo'];
$imagen = $_FILES['fileImagen'];
$estadoPersona = 1;
$imagenNombre = $username;
$dirImagenes = '../../../img/usuarios/';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//De Username
	if (empty(trim($username))) {
		$_SESSION['mensaje_error'] = "El campo Username no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($username)) < 6) {
		$_SESSION['mensaje_error'] = "El campo Username debe contener al menos 6 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($username)) > 21) {
		$_SESSION['mensaje_error'] = "El campo Username debe contener menos 100 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($username)) {
		$_SESSION['mensaje_error'] = "El Username debe ser identificado con letras y numeros";
		header("location: ../alta.php");
		exit;
	} elseif (empty(Usuario::consultarUsername($username))){
		$_SESSION['mensaje_error'] = "Username ya utilizado";
		header("location: ../alta.php");
		exit;
	}
	//De Password
	if (empty(trim($password))) {
		$_SESSION['mensaje_error'] = "El campo Password no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($password)) < 6) {
		$_SESSION['mensaje_error'] = "El campo Password debe contener al menos 6 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($password)) > 21) {
		$_SESSION['mensaje_error'] = "El campo Password debe contener menos 100 caracteres";
		header("location: ../alta.php");
		exit;
	}
	//De Perfil
	if ((int) $perfil == 0) {
		$_SESSION['mensaje_error'] = "El campo Perfil debe ser seleccionado";
		header("location: ../alta.php");
		exit;
	}	
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
	} elseif (strlen(trim($nombre)) > 101) {
		$_SESSION['mensaje_error'] = "El campo Nombre debe contener menos 100 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($nombre)) {
		$_SESSION['mensaje_error'] = "El nombre debe ser identificado sin numeros";
		header("location: ../alta.php");
		exit;
	}
	//De APELLIDO
	if (empty(trim($apellido))) {
		$_SESSION['mensaje_error'] = "El campo apellido no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($apellido)) < 3) {
		$_SESSION['mensaje_error'] = "El campo apellido debe contener al menos 3 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($apellido)) > 101) {
		$_SESSION['mensaje_error'] = "El campo apellido debe contener menos 100 caracteres";
		header("location: ../alta.php");
		exit;
	} elseif (is_numeric($apellido)) {
		$_SESSION['mensaje_error'] = "El apellido debe ser identificado sin numeros";
		header("location: ../alta.php");
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
		$_SESSION['mensaje_error'] = "El usuario es menor de edad, edad: ".$edad;
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	}
	if ($edad > 120) {
		$_SESSION['mensaje_error'] = "El usuario es muy viejo para trabajar, edad: ".$edad;
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	}

	//De DNI
	if (empty(trim($dni))) {
		$_SESSION['mensaje_error'] = "El campo dni no debe estar vacio";
		echo $_SESSION['mensaje_error'];
		header("location: ../alta.php");
		exit;
	} elseif (!is_numeric($dni)) {
		$_SESSION['mensaje_error'] = "El dni debe ser identificado con solo numeros";
		header("location: ../alta.php");
		exit;
	} elseif (strlen(trim($dni)) != 8) {
		$_SESSION['mensaje_error'] = "El campo dni debe contener 10 digitos, sin punto y agregar 0 en caso de valor menor 10 millones";
		header("location: ../alta.php");
		exit;
	}
	//De Sexo
	if ((int) $genero != 1 and (int) $genero != 2) {
		$_SESSION['mensaje_error'] = "El campo Sexo debe ser seleccionado";
		header("location: ../alta.php");
		exit;
	}
	//de Imagen
	if (empty($imagen['name'])){
		$nombreImagen = 'user.png';
	} else {
		//Subir Imagen
		$extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
		$nombreSinEspacios = str_replace(" ", "_", $imagen['name']);
		$fechaHora = date("dmYHis");
		$nombreImagen = $fechaHora . "_" . $nombreSinEspacios;
		$rutaImagen = $dirImagenes . $nombreImagen;
		move_uploaded_file($imagen['tmp_name'], $rutaImagen);
		//
	}
}

$usuario = new Usuario ($username,$password);
$usuario->setIdPerfil($perfil);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setDni($dni);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setSexo($genero);
$usuario->setEstadoPersona($estadoPersona);
$usuario->setAvatar($nombreImagen);

$usuario->guardar();
//echo $dirImagenes;
//highlight_string(var_export($usuario,true));
header("location: ../listado.php");
?>
