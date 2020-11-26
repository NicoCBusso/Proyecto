<?php
require_once "../../class/DetalleVenta.php";
$idDetalleVenta = $_GET['id'];

$validacion = DetalleVenta::validarEstado($idDetalleVenta);

echo $validacion;

?>