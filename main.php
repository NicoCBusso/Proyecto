<?php
require_once "MySQL.php";
require_once "Proveedor.php";
require_once "PersonaFisica.php";
require_once "Usuario.php";
require_once "Empleado.php";
require_once "Pais.php";
require_once "Provincia.php";
require_once "Localidad.php";
require_once "Domicilio.php";
require_once "Pais.php";

//$PersonaFisica = new PersonaFisica("Nicolassssasds","Colossss");
/*$usuario = new Usuario ("usuario","password");
$empleado = new Empleado ("Franco","Nicolas");
//$pais1 = new Pais("Argentina");
$usuario->guardar();
$empleado->guardar();
highlight_string(var_export($usuario, true));
highlight_string(var_export($empleado, true));
*/
$provincia = new Provincia ("Formosa");
$localidad = new Localidad ("Formosa");
$domicilio = new Domicilio ("Mitre 423");
$proveedor = new proveedor ("Barrica");


$provincia->guardar();
$localidad->guardar();
$domicilio->guardar();
$proveedor->guardar();
highlight_string(var_export($proveedor, true));
highlight_string(var_export($localidad, true));
highlight_string(var_export($domicilio, true));
highlight_string(var_export($provincia, true));

?>