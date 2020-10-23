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
	$detalleVenta = DetalleVenta::obtenerPorId($idDetalleVenta);
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
				$stockPuesto->descontar(1);
			}
		}
	}else{
		$stockPuesto = Stock::obtenerPorIdProductoFinalNataliaNatalia($salida->detalle->getIdProductoFinal(),$salida->getIdPuesto());
		var_dump($stockPuesto);
		$stockPuesto->descontar(1);
	}		
	$salida->guardar();	
} 
if(!empty($codigoBarra)){
	$producto = Producto::obtenerPorCodigoBarra($codigoBarra);
	$salida = new Salida();
	$salida->setCodigoBarra($codigoBarra);
	$salida->setFechaHoraEntrega($fechaHora);
	$salida->setIdPuesto($puesto);
	$salida->guardarPorCodigoBarra();
	$stockPuesto = Stock::obtenerPorIdProducto($producto->getIdProducto(),$salida->getIdPuesto());
	$stockPuesto->descontar(1);
}

//Se debe comparar contenido del productofinal con el producto trago
//$stockPuesto = Stock::obtenerPorIdProducto($salida->getIdProducto(),$salida->getIdPuesto());
//$stockPuesto->descontar($salida->getCantidad());

?>

<?php/*
SELECT * FROM productofinal INNER JOIN producto ON productofinal.id_producto.final = trago.id_producto_final WHERE productofinal.id_producto_final = $id


SELECT * FROM productofinal INNER JOIN trago ON productofinal.id_producto.final = trago.id_producto_final 
	WHERE productofinal.id_producto_final = $id  != NULL
	)
if ($trago = Trago::obtenerPorIdProductoFinal($salida->getIdProductoFinal()) != NULL){
	foreach ($trago->getArrProductoTrago() as $productoTrago){
		if($productoTrago->_contenido == $productoTrago->producto->contenido){
		$stockPuesto = Stock::obtenerPorIdProducto($productoTrago->getIdProducto(),$salida->getIdPuesto());
		$stockPuesto->descontar(1);
		$
	}
}
	id_producto final 1 = id_producto 1 = Coca Cola 350ml
	id_producto final 2 = id_trago 1 = Melon con Speed  --> producto_trago(ingredientes)-> id_producto_trago 1, id_producto(licor de melon), cantidad(por ej 350ml), id_trago
																							id_producto_trago 2, id_producto(speed), cantidad(350ml), id trago			


	licor de melon contenido total es 1000ml

	if producto.contenido(Speed 350ml) = producto_trago.contenido(Speed 350)	
		eliminar
	else 
		no se hace nada.
} Sino {
	descontar normal porque es producto, por ej lata de cerveza
}
*/?>