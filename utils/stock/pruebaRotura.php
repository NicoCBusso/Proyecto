<?php
require_once "../../class/Stock.php";
$idPuesto = $_GET['idPuesto'];

$listadoStock = Stock::obtenerListadoPorPuesto($idPuesto);

echo json_encode($listadoStock);

?>