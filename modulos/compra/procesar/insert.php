<?php
require_once "../../../class/Compra.php";
require_once "../../../class/Proveedor.php";
session_start();
const DEPOSITO = 4;
$puesto = DEPOSITO;
$proveedor = $_POST['proveedor'];
$usuarioLogueado = $_SESSION['usuario'];
$tipoComprobante = $_POST['tipoComprobante'];
$fecha = $_POST['fecha'];

if (empty(trim($proveedor))) {
    echo "<span style='font-weight:bold;color:red;'>Campo Proveedor vacio</span>";
    exit;
} elseif ($proveedor == 0) {
    echo "<span style='font-weight:bold;color:red;'>Debe seleccionar proveedor</span>";
    exit;
}elseif  (empty(Proveedor::obtenerPorId($proveedor))) {
    echo "<span style='font-weight:bold;color:red;'>No existe ese proveedor</span>";
    exit;
} 

$compra = new Compra(); // guardamos la cabecera
$compra->setIdUsuario($usuarioLogueado->getIdUsuario());
$compra->setIdTipoComprobante($tipoComprobante);
$compra->setIdProveedor($proveedor);
$compra->setFechaHoraEmision($fecha);
$compra->guardar();
//$detalleCompra = new DetalleCompra(); // guardamos los detalles

foreach($_POST['items'] as $item){
	$detalleCompra = new DetalleCompra($item['id_producto']);
	$detalleCompra->setIdCompra($compra->getIdCompra());
	$detalleCompra->setProducto();
	$detalleCompra->setPrecio();
    $detalleCompra->setCantidad($item['cantidad']);
	$detalleCompra->guardar();
    $stock = Stock::obtenerPorIdProducto($item['id_producto'],$puesto);
    if ($stock == NULL){
        $stock = new Stock();
        $stock->setIdProducto($item['id_producto']);
        $stock->setStockActual($item['cantidad']);
        $stock->setIdPuesto($puesto);        
        $stock->guardar();
    } else{
        $stock->actualizar($item['cantidad']);
    }
}
?>