<?php 
require_once "../../class/Venta.php";

$listadoVenta = Venta::obtenerTodosListado();

echo json_encode($listadoVenta);

?>