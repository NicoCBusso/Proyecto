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

if (empty(trim($idPuesto))) {

	echo "<span style='font-weight:bold;color:red;'>No se selecciono puesto</span>";
	exit;
} elseif (!is_numeric($idPuesto)) {
	echo "<span style='font-weight:bold;color:red;'>Puesto erroneo</span>";
	exit;
}
foreach($_POST['items'] as $item){
    $trago = Trago::obtenerPorIdProductoFinal($item['idConsumicionCambiada']);
	if ($trago != NULL){
		foreach ($trago->getArrProductoTrago() as $productoTrago){
			if($productoTrago->getCantidad() == $productoTrago->producto->getContenido()){
				$stockPuesto = Stock::obtenerPorIdProducto($productoTrago->getIdProducto(),$idPuesto);
				if(empty($stockPuesto)){							
					echo "<span style='font-weight:bold;color:red;'>No hay ". $productoTrago->producto->getNombre() ." para el trago en barra</span>";
					exit;
				} else {
					if($stockPuesto->_stockActual > 0){
						$stockPuesto->descontar(CANTIDAD);
					} else {
						echo "<span style='font-weight:bold;color:red;'>No hay stock en barra de ".$productoTrago->producto->getNombre()."</span>";
						exit;
					}
				}
			}
		}
	}else{
		$stockPuesto = Stock::obtenerPorIdProductoFinalNataliaNatalia($item['idConsumicionCambiada'],$idPuesto);
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