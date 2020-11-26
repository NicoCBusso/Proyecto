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

    if(empty($stockPuesto)){
		echo "<span style='font-weight:bold;color:red;'>No hay ese producto en barra</span>";
		exit;
	} else {
		//var_dump($stockPuesto);
		if($stockPuesto->_stockActual > 0){
			$stockPuesto->descontar(CANTIDAD);
		} else {
			echo "<span style='font-weight:bold;color:red;'>No hay stock en barra</span>";
			exit;
		}
	}

    //$stockPuesto->descontar(CANTIDAD);    	    	       

	$excepcion = new Excepcion();
	$excepcion->setFechaHora($fechaHora);
	$excepcion->setIdConsumicionACambiar($item['idConsumicionACambiar']);
	$excepcion->setIdConsumicionCambiada($item['idConsumicionACambiar']);
	$excepcion->setIdPuesto($puesto);
	$excepcion->setIdUsuario($usuarioLogueado->getIdUsuario());
	$excepcion->setIdTipoExcepcion(EXCEPCIONROTURA);
	$excepcion->guardar();
}

?>
