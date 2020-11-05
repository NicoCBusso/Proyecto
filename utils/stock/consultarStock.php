<?php
require_once "../../class/Stock.php";
$idProducto = $_GET['idProducto'];

$arrStock = Stock::consultarStock($idProducto);

echo json_encode($arrStock);

?>