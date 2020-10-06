<?php
require_once "../../../class/Compra.php";
session_start();
$lugar = 4;
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
    //$cantidad = DetalleCompra::consultarStock($item['id_producto_final']);
    /*if ($cantidad < $item['cantidad']){
        $_SESSION['mensaje_error'] = "Cantidad excedida al stock del producto de codigo =".$item['id_producto_final'];
        exit;
    }*/
	$detalleCompra->setIdCompra($compra->getIdCompra());
	$detalleCompra->setProducto();
	$detalleCompra->setPrecio();
    $detalleCompra->setCantidad($item['cantidad']);
	$detalleCompra->guardar();
    $stock = new Stock();
    $stock->actualizar($lugar,$item['id_producto'],$item['cantidad']);
}


//header("location: ../alta.php");
?>