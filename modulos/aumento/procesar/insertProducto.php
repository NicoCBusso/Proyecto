<?php

require_once "../../../class/MySQL.php";

require_once "../../../class/Producto.php";	

$idMarca = $_GET['idMarca'];
$idSubCategoria = $_GET['idSubCategoria'];
$idProveedor = $_GET['idProveedor'];
$aumento = $_GET['aumento'];

$sql = "UPDATE producto" 
		." INNER JOIN productofinal ON producto.id_producto_final = productofinal.id_producto_final"
		." SET precio_venta = precio_venta+(precio_venta * $aumento / 100) WHERE ";

$sqlMostrar = "SELECT productofinal.descripcion, productofinal.precio_venta FROM producto"
				." INNER JOIN productofinal ON producto.id_producto_final = productofinal.id_producto_final WHERE ";

if (isset($idProveedor)) {
    if (!empty($idProveedor)) {
        $sql .= "id_proveedor = '$idProveedor' ";
        $sqlMostrar .= "id_proveedor = '$idProveedor' ";
        if (isset($idSubCategoria)) {
		    if (!empty($idSubCategoria)) {
		        $sql .= "AND id_subcategoria = $idSubCategoria ";
		        $sqlMostrar .= "AND id_subcategoria = $idSubCategoria ";		           
		    }
		}
		if (isset($idMarca)) {
		    if (!empty($idMarca)) {
		        $sql .= "AND id_marca = '$idMarca' ";
		        $sqlMostrar .= "AND id_marca = '$idMarca' ";


		    }    
	}
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$datosMostrar = $mysql->consultar($sqlMostrar);
	$mysql->desconectar();
	//var_dump($sql);

	$listado = array();
    while($r = mysqli_fetch_assoc($datosMostrar)) {
        $listado[] = $r;
    }
	echo json_encode($listado);

	exit;	
    }
}
if (isset($idSubCategoria)) {
    if (!empty($idSubCategoria)) {
        $sql .= "id_subcategoria = $idSubCategoria ";
        $sqlMostrar .= "id_subcategoria = $idSubCategoria ";
	    if (isset($idMarca)) {
		    if (!empty($idMarca)) {
		        $sql .= "AND id_marca = '$idMarca' ";
		        $sqlMostrar .= "AND id_marca = '$idMarca' ";

		    }		           
	    }
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$datosMostrar = $mysql->consultar($sqlMostrar);
	$mysql->desconectar();

	//var_dump($sql);

	$listado = array();
    while($r = mysqli_fetch_assoc($datosMostrar)) {
        $listado[] = $r;
    }
	echo json_encode($listado);
	exit;	
	}
}
if (isset($idMarca)) {
    if (!empty($idMarca)) {
        $sql .= "id_marca = '$idMarca' ";
        $sqlMostrar .= "id_marca = '$idMarca' ";
    $mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$datosMostrar = $mysql->consultar($sqlMostrar);
	$mysql->desconectar();
	//var_dump($sql);

	$listado = array();
    while($r = mysqli_fetch_assoc($datosMostrar)) {
        $listado[] = $r;
    }
	echo json_encode($listado);
	exit;    
    }		           
}
?>