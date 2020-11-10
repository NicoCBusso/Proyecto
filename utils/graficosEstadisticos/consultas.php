<?php
require_once "../../class/MySQL.php";

function cantidadVendidas(){
	$sql = "SELECT productofinal.descripcion,"
		."COUNT(detalleventa.id_producto_final) AS cantidad,"	
		."SUM(detalleventa.precio) AS total"
		." FROM venta INNER JOIN detalleventa ON venta.id_venta = detalleventa.id_venta" 
		." INNER JOIN productofinal ON productofinal.id_producto_final = detalleventa.id_producto_final"
		." GROUP BY productofinal.descripcion";
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();

	$listado = array();
    while($r = mysqli_fetch_assoc($datos)) {
        $listado[] = $r;
    }
	return $listado;
}
function cantidadCompradas(){
	$sql = "SELECT productofinal.descripcion,"
		."COUNT(detallecompra.id_producto) AS cantidad,"	
		."SUM(detallecompra.precio) AS total"
		." FROM compra INNER JOIN detallecompra ON compra.id_compra = detallecompra.id_compra"
		." INNER JOIN producto ON producto.id_producto = detallecompra.id_producto"
		." INNER JOIN productofinal ON productofinal.id_producto_final = producto.id_producto_final"
		." GROUP BY productofinal.descripcion";
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();

	$listado = array();
    while($r = mysqli_fetch_assoc($datos)) {
        $listado[] = $r;
    }
	return $listado;
}
function totalVendidoPorMes(){
	$sql = "SELECT SUM(detalleventa.precio) AS total,"
			."MONTHNAME(venta.fecha_hora_emision) AS mes,"
			."productofinal.descripcion"
			." FROM venta INNER JOIN detalleventa ON venta.id_venta = detalleventa.id_venta" 
			." INNER JOIN productofinal ON productofinal.id_producto_final = detalleventa.id_producto_final"
			." GROUP BY mes;";
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();

	$listado = array();
    while($r = mysqli_fetch_assoc($datos)) {
        $listado[] = $r;
    }
	return $listado;
}
?>