<?php
require_once "../../../class/Salida.php";
require_once "../../../class/Producto.php";
require_once "../../../class/Trago.php";
session_start();
$idDetalleVenta = $_POST['idDetalleVenta'];
$codigoBarra = $_POST['codigoBarra'];
$fechaHora = date("Y-m-d H:i:s"); 
$puesto = $_POST['puesto'];



if (!empty($idDetalleVenta)) {
	$idDetalleVenta = $_POST['idDetalleVenta'];
	//validaciones
	$validacionEstadoDetalleVenta = DetalleVenta::validarEstado($idDetalleVenta);
	if (!empty($validacionEstadoDetalleVenta)){
		echo $validacionEstadoDetalleVenta;
		//echo "entro";
		exit;
	} else {
		$detalleVenta = DetalleVenta::obtenerPorId($idDetalleVenta);
		if(empty($detalleVenta)){
			echo "<span style='font-weight:bold;color:red;'>No existe esa consumicion</span>";
			exit;
		} else {
			$salida = new Salida();
			$salida->setIdDetalleVenta($detalleVenta->getIdDetalleVenta());
			$salida->setFechaHoraEntrega($fechaHora);
			$salida->setCodigoBarra(1);
			$salida->setIdPuesto($puesto);
			$salida->setDetalle();
			$trago = Trago::obtenerPorIdProductoFinal($salida->detalle->getIdProductoFinal());
			if ($trago != NULL){
				foreach ($trago->getArrProductoTrago() as $productoTrago){
					if($productoTrago->getCantidad() == $productoTrago->producto->getContenido()){
						$stockPuesto = Stock::obtenerPorIdProducto($productoTrago->getIdProducto(),$salida->getIdPuesto());
						if(empty($stockPuesto)){							
							echo "<span style='font-weight:bold;color:red;'>No hay ". $productoTrago->producto->getNombre() ." para el trago en barra</span>";
							exit;
						} else {
							if($stockPuesto->_stockActual > 0){
								$stockPuesto->descontar(1);
							} else {
								echo "<span style='font-weight:bold;color:red;'>No hay stock en barra de ".$productoTrago->producto->getNombre()."</span>";
								exit;
							}
						}
					}
				}
			}else{
				$stockPuesto = Stock::obtenerPorIdProductoFinalNataliaNatalia($salida->detalle->getIdProductoFinal(),$salida->getIdPuesto());
				if(empty($stockPuesto)){
					echo "<span style='font-weight:bold;color:red;'>No hay ese producto en barra</span>";
					exit;
				} else {
					//var_dump($stockPuesto);
					if($stockPuesto->_stockActual > 0){
						$stockPuesto->descontar(1);
					} else {
						echo "<span style='font-weight:bold;color:red;'>No hay stock en barra</span>";
						exit;
					}
				}	
			}
			$salida->detalle->cambiarEstadoConsumido();		
			$salida->guardar();
			echo "<span style='font-weight:bold;color:green;'>Consumicion registrada Existosamente</span>";
		}			
	}

} 
if(!empty($codigoBarra)){
	$producto = Producto::obtenerPorCodigoBarra($codigoBarra);
	if(empty($producto)){
		echo "<span style='font-weight:bold;color:red;'>Codigo de barra erroneo</span>";
		exit;
	}
	$salida = new Salida();
	$salida->setCodigoBarra($codigoBarra);
	$salida->setFechaHoraEntrega($fechaHora);
	$salida->setIdPuesto($puesto);
	$stockPuesto = Stock::obtenerPorIdProducto($producto->getIdProducto(),$salida->getIdPuesto());
	if(empty($stockPuesto)){
		echo "<span style='font-weight:bold;color:red;'>No hay ese producto en barra</span>";
		exit;
	} else {
		//var_dump($stockPuesto);
		if($stockPuesto->_stockActual > 0){
			$stockPuesto->descontar(1);
			echo "<span style='font-weight:bold;color:green;'>Producto descontado Existosamente</span>";
		} else {
			echo "<span style='font-weight:bold;color:red;'>No hay stock en barra</span>";
			exit;
		}
	}	
	$salida->guardarPorCodigoBarra();
	
}
?>

