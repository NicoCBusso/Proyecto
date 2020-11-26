<?php
require_once "../../../class/DetalleVenta.php";
require_once "../../../class/Excepcion.php";
require_once "../../../class/Producto.php";

const CAJA = 10;
const EXCEPCIONCAMBIO = 1;
const CANCELADO = 3;
session_start();
$usuarioLogueado = $_SESSION['usuario'];
$fechaHora = date("Y-m-d H:i:s"); 
$puesto = $_POST['idPuesto'];

foreach($_POST['items'] as $item){
	$detalleVenta = DetalleVenta::obtenerPorId($item['idDetalleVenta']);
	$detalleVenta->setEstado(CANCELADO);
	$detalleVenta->cancelar();

	$detalleVentaNuevo = new DetalleVenta($item['idConsumicionCambiada']);
	$detalleVentaNuevo->setIdVenta($detalleVenta->getIdVenta());
	$detalleVentaNuevo->setProductoFinal();
	$detalleVentaNuevo->setPrecio();
	$detalleVentaNuevo->setEstado(1);
	$detalleVentaNuevo->guardar();

	$excepcion = new Excepcion();
	$excepcion->setFechaHora($fechaHora);
	$excepcion->setIdConsumicionACambiar($item['idConsumicionACambiar']);
	$excepcion->setIdConsumicionCambiada($item['idConsumicionCambiada']);
	$excepcion->setIdPuesto(CAJA);
	$excepcion->setIdUsuario($usuarioLogueado->getIdUsuario());
	$excepcion->setIdTipoExcepcion(EXCEPCIONCAMBIO);
	$excepcion->guardar();
}

?>

