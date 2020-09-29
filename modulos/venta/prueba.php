<?php
require_once "../../../class/Venta.php";
$listaDetalleVenta = array();

$usuario = 1;


$venta = new Venta;
$venta->guardar();

$detalleVenta1 = new DetalleVenta(7);
$detalleVenta1->setIdVenta();
$detalleVenta1->setProductoFinal();
$detalleVenta2->setPrecio();
$detalleVenta1->setEstado();


$detalleVenta2 = new DetalleVenta(11);
$detalleVenta2->setIdVenta();
$detalleVenta2->setProductoFinal();
$detalleVenta2->setPrecio();
$detalleVenta2->setEstado();

$venta


?>