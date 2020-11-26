<?php

require_once "../../class/DetalleVenta.php";
const SIN_CONSUMIR = 1;
const CONSUMIDO = 2;
const SIN_EXISTENCIA = 3;
$idDetalleVenta = $_POST['idDetalleVenta'];

$detalleVenta=DetalleVenta::obtenerPorId($idDetalleVenta);
if(!empty($detalleVenta)){
	if($detalleVenta->getEstado() == SIN_CONSUMIR){
		echo json_encode($detalleVenta);
	} else {
		echo CONSUMIDO;
	}
} else {
	echo SIN_EXISTENCIA;
}

?>