<?php

require_once "../../class/DetalleVenta.php";

$idDetalleVenta = $_POST['idDetalleVenta'];

$detalleVenta=DetalleVenta::obtenerPorId($idDetalleVenta);

echo json_encode($detalleVenta);

?>