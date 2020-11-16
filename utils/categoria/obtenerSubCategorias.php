<?php
require_once "../../class/SubCategoria.php";
$idRecibido = $_GET['id'];

$listadoSubCategoria = SubCategoria::obtenerPorIdCategoria($idRecibido);
if ($idRecibido == 0){
$options = "<option>Seleccionar</option>";}

elseif ($idRecibido != 0) {
	$options = "<option value=0>Seleccionar</option>";
	foreach ($listadoSubCategoria as $subcategoria) {
	$options .= '<option value="'.$subcategoria->getIdSubCategoria().'">'.$subcategoria->getNombre().'</option>';
	}
}
echo $options;
?>