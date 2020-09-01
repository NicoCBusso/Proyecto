<?php
require_once "../../class/Provincia.php";
$idRecibido = $_GET['id'];

$listadoProvincia = Provincia::obtenerPorIdPais($idRecibido);
if ($idRecibido == 0){
$options = "<option>Seleccionar</option>";}

elseif ($idRecibido != 0) {
	$options = "<option value=0>Seleccionar</option>";
	foreach ($listadoProvincia as $provincia) {
	$options .= '<option value="'.$provincia->getIdProvincia().'">'.$provincia->getDescripcion().'</option>';
	}
}



echo $options;
?>