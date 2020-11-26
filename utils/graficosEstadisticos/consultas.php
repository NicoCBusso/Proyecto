<?php
require_once "../../class/MySQL.php";

function puestoConMasSalida(){
	$sql = "SELECT puesto.lugar"
			." FROM salida INNER JOIN puesto ON salida.id_puesto = puesto.id_puesto"
			." WHERE YEAR(fecha_hora_entrega) = YEAR(CURRENT_DATE()) "
			." AND id_detalle_venta != 1 "
			." ORDER BY COUNT(salida.id_puesto)";
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();

	$registro = $datos->fetch_assoc();
	return $registro['lugar'];
}

function productoMasVendido(){
	$sql = "SELECT descripcion AS producto "
			."FROM venta INNER JOIN detalleventa ON venta.id_venta = detalleventa.id_venta"
			." INNER JOIN productofinal ON productofinal.id_producto_final = detalleventa.id_producto_final"
			." INNER JOIN producto ON producto.id_producto_final = productofinal.id_producto_final  "
			." WHERE YEAR(fecha_hora_emision) = YEAR(CURRENT_DATE()) AND MONTH(fecha_hora_emision) = MONTH(CURRENT_DATE())"
			." GROUP BY descripcion ORDER BY COUNT(detalleventa.id_producto_final) DESC LIMIT 1";
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	if($datos->num_rows > 0 ){
		$registro = $datos->fetch_assoc();
		return $registro['producto'];
	} else {
		return;
	}
}

function tragoMasVendido(){
	$sql = "SELECT descripcion AS trago "
			."FROM venta INNER JOIN detalleventa ON venta.id_venta = detalleventa.id_venta"
			." INNER JOIN productofinal ON productofinal.id_producto_final = detalleventa.id_producto_final"
			." INNER JOIN trago ON trago.id_producto_final = productofinal.id_producto_final  "
			." WHERE YEAR(fecha_hora_emision) = YEAR(CURRENT_DATE()) AND MONTH(fecha_hora_emision) = MONTH(CURRENT_DATE())"
			." GROUP BY descripcion ORDER BY COUNT(detalleventa.id_producto_final) DESC LIMIT 1";
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	if($datos->num_rows > 0 ){
		$registro = $datos->fetch_assoc();
		return $registro['trago'];
	} else {
		return;
	}
}

function cantidadVendidasDelMes(){
	$sql = "SELECT MONTHNAME(venta.fecha_hora_emision) AS Mes, productofinal.descripcion," 
			."COUNT(detalleventa.id_producto_final) AS cantidad"
			." FROM venta INNER JOIN detalleventa ON venta.id_venta = detalleventa.id_venta"
			." INNER JOIN productofinal ON productofinal.id_producto_final = detalleventa.id_producto_final"
			." WHERE YEAR(fecha_hora_emision) = YEAR(CURRENT_DATE()) AND MONTH(fecha_hora_emision) = MONTH(CURRENT_DATE())"
			." GROUP BY productofinal.descripcion LIMIT 10";
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();

	$listado = array();
    while($r = mysqli_fetch_assoc($datos)) {
        $listado[] = $r;
    }
	return $listado;
}

function totalVentasDelAño(){
	$sql = "SELECT COUNT(detalleventa.id_detalle_venta) AS cantidad"
			." FROM venta INNER JOIN detalleventa ON venta.id_venta = detalleventa.id_venta"
			." INNER JOIN productofinal ON productofinal.id_producto_final = detalleventa.id_producto_final"
			." WHERE YEAR(fecha_hora_emision) = YEAR(CURRENT_DATE()) AND detalleventa.estado = 1";
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();

	$registro = $datos->fetch_assoc();
	return $registro['cantidad'];
}
function totalFacturadoDelAño(){
	$sql = "SELECT SUM(detalleventa.precio) AS facturado"
			." FROM venta INNER JOIN detalleventa ON venta.id_venta = detalleventa.id_venta"
			." WHERE YEAR(fecha_hora_emision) = YEAR(CURRENT_DATE()) AND detalleventa.estado = 1";
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();

	$registro = $datos->fetch_assoc();
	return $registro['facturado'];
}
function totalComprasDelAño(){
	$sql = "SELECT COUNT(detallecompra.id_detalle_compra) AS cantidad"
			." FROM compra INNER JOIN detallecompra ON compra.id_compra = detallecompra.id_compra"
			." INNER JOIN producto ON producto.id_producto = detallecompra.id_producto"
			." WHERE YEAR(fecha) = YEAR(CURRENT_DATE())";
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();

	$registro = $datos->fetch_assoc();
	return $registro['cantidad'];
}

function cantidadCompradasDelMes(){
	$sql = "SELECT MONTHNAME(compra.fecha) AS Mes, productofinal.descripcion," 
			."COUNT(detallecompra.id_producto) AS cantidad,"	
			."SUM(detallecompra.precio) AS total"
			." FROM compra INNER JOIN detallecompra ON compra.id_compra = detallecompra.id_compra"
			." INNER JOIN producto ON producto.id_producto = detallecompra.id_producto"
			." INNER JOIN productofinal ON productofinal.id_producto_final = producto.id_producto_final"
			." WHERE YEAR(fecha) = YEAR(CURRENT_DATE()) AND MONTH(fecha) = MONTH(CURRENT_DATE())"
			." GROUP BY productofinal.descripcion LIMIT 10";
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
			." WHERE YEAR(fecha_hora_emision) = YEAR(CURRENT_DATE()) AND detalleventa.estado = 1"
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

//function consultasVenta0030a0100
?>