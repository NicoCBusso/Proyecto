<?php
require_once "../../class/MySQL.php";
require_once "../../class/Venta.php";
require_once "../../class/DetalleVenta.php";

$fechaDesde = $_GET['fechaDesde'];
$fechaHasta = $_GET['fechaHasta'];
$idProductoFinal = $_GET['idProductoFinal'];
$tipoDeOrden = $_GET['tipoDeOrden'];

$sql = "SELECT productofinal.descripcion,"
		."COUNT(detalleventa.id_producto_final) AS cantidad,"	
		."SUM(detalleventa.precio) AS total"
		." FROM venta INNER JOIN detalleventa ON venta.id_venta = detalleventa.id_venta" 
		." INNER JOIN productofinal ON productofinal.id_producto_final = detalleventa.id_producto_final WHERE ";
$finalSql =" GROUP BY productofinal.descripcion ORDER BY $tipoDeOrden DESC";

if (isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($fechaDesde) && !empty($fechaHasta)) {
        $sql .= "venta.fecha_hora_emision BETWEEN '$fechaDesde' AND '$fechaHasta' ";
        if (isset($idProductoFinal)) {
		    if (!empty($idProductoFinal)) {
		        $sql .= "AND detalleventa.id_producto_final = $idProductoFinal ";		           
		    }
		}
	$sql .= $finalSql;
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	//echo $sql;
	//echo $datos;
	$listado = array();
	if ($datos->num_rows > 0){
	    while($r = mysqli_fetch_assoc($datos)) {
	        $listado[] = $r;
	    }
    } else {
    	$listado[] = $datos;
    }
	echo json_encode($listado);
	exit;	   
	}
}
 
if (isset($idProductoFinal)) {
    if (!empty($idProductoFinal)) {
        $sql .= "detalleventa.id_producto_final = '$idProductoFinal' ";
        $sql .= $finalSql	;
		$mysql = new MySQL();
		$datos = $mysql->consultar($sql);
		$mysql->desconectar();
		//echo $sql;
		$listado = array();
		if ($datos->num_rows > 0){
		    while($r = mysqli_fetch_assoc($datos)) {
		        $listado[] = $r;
		    }
	    } else {
	    	$listado = $datos;
	    }
		echo json_encode($listado);
		exit;     
    }
}
?>