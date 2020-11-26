<?php
require_once "../../../class/MySQL.php";
require_once "../../../class/Producto.php";	
require_once "../../../class/Aumento.php";	

$idProducto = $_GET['idProducto'];

$aumento = $_GET['aumento'];
if(!empty($idProducto)){
	if (empty(Producto::obtenerPorId($idProducto))){
		exit;
	}
}
if (empty($aumento)){
	//echo "<span style='font-weight:bold;color:red;'>Aumento no asignado</span>";
	exit;
} else if ($aumento == 0){
	//echo "<span style='font-weight:bold;color:red;'>Aumento en 0</span>";
	exit;	
} else if ($aumento < 0){
	//echo "<span style='font-weight:bold;color:red;'>Aumento en 0</span>";
	exit;
}

$sql = "UPDATE productofinal "
		."INNER JOIN trago ON trago.id_producto_final = productofinal.id_producto_final "
		."INNER JOIN producto_trago ON producto_trago.id_trago = trago.id_trago "
		."SET precio_venta = precio_venta+(precio_venta * $aumento / 100)";

$sqlMostrar = "SELECT productofinal.id_producto_final,productofinal.descripcion, productofinal.precio_venta FROM trago"
			." INNER JOIN productofinal ON trago.id_producto_final = productofinal.id_producto_final"
			." INNER JOIN producto_trago ON producto_trago.id_trago = trago.id_trago ";

if (isset($idProducto)) {
    if (!empty($idProducto)) {
        $sql .= " WHERE producto_trago.id_producto = '$idProducto' ";
        $sqlMostrar .= " WHERE producto_trago.id_producto = '$idProducto' ";

		$mysql = new MySQL();
		$datos = $mysql->consultar($sql);
		$datosMostrar = $mysql->consultar($sqlMostrar);
		$mysql->desconectar();

		$listado = array();
		while($r = mysqli_fetch_assoc($datosMostrar)) {
		    $listado[] = $r;
		    /*$aumento = new Aumento();
		    $aumento->setIdProductoFinal($r['id_producto_final']);
		    $aumento->setPorcentaje($aumento);
		    //var_dump($aumento);
		    $aumento->guardar();*/
		}
		echo json_encode($listado);
		exit;     
    }		           
}
$mysql = new MySQL();
$datos = $mysql->consultar($sql);
$datosMostrar = $mysql->consultar($sqlMostrar);
$mysql->desconectar();

$listado = array();
while($r = mysqli_fetch_assoc($datosMostrar)) {
    $listado[] = $r;
    /*$aumento = new Aumento();
    $aumento->setIdProductoFinal($r['id_producto_final']);
    $aumento->setPorcentaje($aumento);
    $aumento->guardar();*/
}
echo json_encode($listado);
exit;  
?>