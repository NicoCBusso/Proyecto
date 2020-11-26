<?php
require_once '../../class/Stock.php';

$idProductoFinal = $_GET['id'];
$stock = Stock::obtenerPorIdProductoFinal($idProductoFinal);

if (is_null($stock->_idStock)){
	echo "entro aca";
    $stock = Stock::obtenerStockIngredientesTragos($idProductoFinal);
} else {
	echo "entro en el else";
    $stock = Stock::obtenerPorIdProductoFinal($idProductoFinal);
}
//var_dump($stock);

//echo json_encode($stock);
?>