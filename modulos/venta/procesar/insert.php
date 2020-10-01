<?php
require_once "../../../class/Venta.php";
session_start();
$usuarioLogueado = $_SESSION['usuario'];
	$fechaHora = date("Y-m-d H:i:s");
	
    $venta = new Venta(); // guardamos la cabecera
    $venta->setIdUsuario($usuarioLogueado->getIdUsuario());
    $venta->setFechaHoraEmision($fechaHora);
    $venta->setEstado(1);
    $venta->guardar();
    //highlight_string(var_export($venta,true));
   //$detalleVenta = new DetalleVenta(); // guardamos los detalles
   
    foreach($_POST['items'] as $item){
    	//echo var_dump($item);
        for  ($x=1; $x<=$item['cantidad'];$x++) {        	
        	$detalleVenta = new DetalleVenta($item['id_producto_final']);
            //$cantidad = DetalleVenta::consultarStock($item['id_producto_final']);
            /*if ($cantidad < $item['cantidad']){
                $_SESSION['mensaje_error'] = "Cantidad excedida al stock del producto de codigo =".$item['id_producto_final'];
                exit;
            }*/
			$detalleVenta->setIdVenta($venta->getIdVenta());
			$detalleVenta->setProductoFinal();
			$detalleVenta->setPrecio();
			$detalleVenta->setEstado(1);
			$detalleVenta->guardar();
        }
    }
//header("location: ../alta.php");
?>