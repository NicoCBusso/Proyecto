<?php
require_once "../../../class/Compra.php";
session_start();
$puesto = 4;
$proveedor = $_POST['proveedor'];
$usuarioLogueado = $_SESSION['usuario'];
$tipoComprobante = $_POST['tipoComprobante'];
$fecha = $_POST['fecha'];

$compra = new Compra(); // guardamos la cabecera
$compra->setIdUsuario($usuarioLogueado->getIdUsuario());
$compra->setIdTipoComprobante($tipoComprobante);
$compra->setIdProveedor($proveedor);
$compra->setFechaHoraEmision($fecha);
$compra->guardar();
//$detalleCompra = new DetalleCompra(); // guardamos los detalles

foreach($_POST['items'] as $item){
    highlight_string(var_export($item,true));
	$detalleCompra = new DetalleCompra($item['id_producto']);
	$detalleCompra->setIdCompra($compra->getIdCompra());
	$detalleCompra->setProducto();
	$detalleCompra->setPrecio();
    $detalleCompra->setCantidad($item['cantidad']);
	$detalleCompra->guardar();
    $stock = Stock::obtenerPorIdProducto($item['id_producto'],$puesto);
    var_dump($stock);
    if ($stock == NULL){
        $stock = new Stock();
        $stock->setIdProducto($item['id_producto']);
        $stock->setStockActual($item['cantidad']);
        $stock->setIdPuesto($puesto);        
        $stock->guardar();
        var_dump($stock);
    } else{

        $stock->actualizar($item['cantidad']);
        
    }
}


//header("location: ../alta.php");
?>