<?php 
require_once "../../class/Compra.php";

$listadoCompra = Compra::obtenerTodosListado();

echo json_encode($listadoCompra);

?>