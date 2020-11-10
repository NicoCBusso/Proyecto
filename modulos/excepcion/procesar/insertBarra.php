<?php
require_once "../../../class/Excepcion.php";
require_once "../../../class/Trago.php";
require_once "../../../class/Usuario.php";
const EXCEPCIONBARRA = 3;
const CANTIDAD = 1;
session_start();
$usuarioLogueado = $_SESSION['usuario'];
//$usuario = $_POST['idUsuario'];
//highlight_string(var_export($usuarioLogueado,true));
$fechaHora = date("Y-m-d H:i:s");
$idPuesto = $_POST['idPuesto'];
foreach($_POST['items'] as $item){
    //Se descuenta producto cambiado
    $trago = Trago::obtenerPorIdProductoFinal($item['idConsumicionCambiada']);
	if ($trago != NULL){
		foreach ($trago->getArrProductoTrago() as $productoTrago){
			if($productoTrago->getCantidad() == $productoTrago->producto->getContenido()){
				$stockPuesto = Stock::obtenerPorIdProducto($productoTrago->getIdProducto(),$salida->getIdPuesto());
				$stockPuesto->descontar(CANTIDAD);
			}
		}
	}else{
		$stockPuesto = Stock::obtenerPorIdProductoFinalNataliaNatalia($item['idConsumicionCambiada'],$idPuesto);
		//var_dump($stockPuesto);
		$stockPuesto->descontar(CANTIDAD);
	}

	$excepcion = new Excepcion();
	$excepcion->setFechaHora($fechaHora);
	$excepcion->setIdConsumicionACambiar($item['idConsumicionACambiar']);
	$excepcion->setIdConsumicionCambiada($item['idConsumicionCambiada']);
	$excepcion->setIdPuesto($idPuesto);
	$excepcion->setIdUsuario($usuarioLogueado->getIdUsuario());
	$excepcion->setIdTipoExcepcion(EXCEPCIONBARRA);
	$excepcion->guardar();
}
?>