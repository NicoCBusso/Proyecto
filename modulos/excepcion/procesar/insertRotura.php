<?php

require_once "../../../class/Excepcion.php";
require_once "../../../class/Producto.php";
require_once "../../../class/Usuario.php";
const EXCEPCIONROTURA = 2;
const CANTIDAD = 1;

session_start();
$usuarioLogueado = $_SESSION['usuario'];
$fechaHora = date("Y-m-d H:i:s"); 
$puesto = $_POST['idPuesto'];

foreach($_POST['items'] as $item){

    $stockPuesto = Stock::obtenerPorIdProductoFinalNataliaNatalia($item['idConsumicionACambiar'],$puesto);
    $stockPuesto->descontar(CANTIDAD);    	    	       

	$excepcion = new Excepcion();
	$excepcion->setFechaHora($fechaHora);
	$excepcion->setIdConsumicionACambiar($item['idConsumicionACambiar']);
	$excepcion->setIdConsumicionCambiada($item['idConsumicionCambiada']);
	$excepcion->setIdPuesto($puesto);
	$excepcion->setIdUsuario($usuarioLogueado->getIdUsuario());
	$excepcion->setIdTipoExcepcion(EXCEPCIONROTURA);
	$excepcion->guardar();
}

?>
