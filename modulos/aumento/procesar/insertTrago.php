<?php
require_once "../../../class/MySQL.php";
require_once "../../../class/Producto.php";	


$idProducto = $_GET['idProducto'];
$aumento = $_GET['aumento'];

$sql = "UPDATE productofinal "
		."INNER JOIN trago ON trago.id_producto_final = productofinal.id_producto_final "
		."INNER JOIN producto_trago ON producto_trago.id_trago = trago.id_trago "
		."SET precio_venta = precio_venta+(precio_venta * $aumento / 100)";

if (isset($idProducto)) {
    if (!empty($idProducto)) {
        $sql .= " WHERE producto_trago.id_producto = '$idProducto' ";
    $mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	var_dump($sql);
	//echo '<br>';
	//echo json_encode($listado);
	exit;    
    }		           
}
?>