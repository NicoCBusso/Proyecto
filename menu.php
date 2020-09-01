<?php

require_once "class/Usuario.php";

session_start();

if (!isset($_SESSION['usuario'])) {
	header('location: formulario_login.php');
}

$usuarioLogueado = $_SESSION['usuario'];
//highlight_string(var_export($usuario,true));
/*<p><a href="modulos/usuario/listadoUsuario.php" role="button" title="Editar">Usuario</a>;</p>
<p><a href="modulos/empleado/listadoEmpleado.php" role="button" title="Editar">Empleado</a>;</p>
<p><a href="modulos/personafisica/listadoPersonaFisica.php" role="button" title="Editar">PersonaFisica</a>;</p>
<p><a href="modulos/perfil/listadoPerfil.php" role="button" title="Editar">Perfil</a>;</p>
<p><a href="modulos/pais/listadoPais.php" role="button" title="Editar">Pais</a>;</p>*/
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php foreach ($usuarioLogueado->perfil->getArrModulos() as $modulo): ?>

    	<a href="/programacion3/Proyecto/modulos/<?php echo $modulo->getDirectorio() ?>/listado.php">
			<?php echo $modulo ?>
		</a>
		|

	<?php endforeach ?>

	<?php echo $usuarioLogueado ?>
	|
	<a href="logout.php">Salir</a>

</body>
</html>


