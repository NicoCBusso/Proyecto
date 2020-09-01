<?php
require_once "../../class/Localidad.php";
$idRecibido = $_GET['id'];

$listadoLocalidad = Localidad::obtenerPorIdProvincia($idRecibido);
if ($idRecibido == 0){
$options = "<option>Seleccionar</option>";}

elseif ($idRecibido != 0) {
	$options = "<option value=0>Seleccionar</option>";
	foreach ($listadoLocalidad as $localidad) {
	$options .= '<option value="'.$localidad->getIdLocalidad().'">'.$localidad->getDescripcion().'</option>';
	}
}



echo $options;
?>