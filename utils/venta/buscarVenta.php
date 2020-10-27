<?php
require_once "../../class/MySQL.php";
require_once "../../class/Venta.php";
require_once "../../class/DetalleVenta.php";

$fechaDesde = $_GET['fechaDesde'];
$fechaHasta = $_GET['fechaHasta'];
$idProductoFinal = $_GET['idProductoFinal'];
$idUsuario = $_GET['idUsuario'];

$sql = "SELECT detalleventa.id_venta,venta.fecha_hora_emision,detalleventa.id_producto_final,venta.id_usuario,venta.estado,venta.fecha_hora_expiracion FROM venta INNER JOIN detalleventa ON venta.id_venta = detalleventa.id_venta WHERE ";
//var_dump($sql);
$finalSql = " GROUP BY venta.id_venta";

if (isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($fechaDesde) && !empty($fechaHasta)) {
        $sql .= "venta.fecha_hora_emision BETWEEN '$fechaDesde' AND '$fechaHasta' ";
        if (isset($idProductoFinal)) {
		    if (!empty($idProductoFinal)) {
		        $sql .= "AND detalleventa.id_producto_final = $idProductoFinal ";		           
		    }
		}
		if (isset($idUsuario)) {
		    if (!empty($idUsuario)) {
		        $sql .= "AND venta.id_usuario = '$idUsuario' ";        
		    }
		}
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	$listado = Venta::_generarListadoVenta($datos);
	echo json_encode($listado);
	exit;	
    }
} 
if (isset($idProductoFinal)) {
    if (!empty($idProductoFinal)) {
        $sql .= "detalleventa.id_producto_final = '$idProductoFinal' ";
        if (isset($idUsuario)) {
		    if (!empty($idUsuario)) {
		        $sql .= "AND venta.id_usuario = '$idUsuario' ";        
		    }
		}
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	echo $sql;
	echo '<br>';
	$listado = Venta::_generarListadoVenta($datos);
	echo json_encode($listado);
	exit;     
    }
}
if (isset($idUsuario)) {
    if (!empty($idUsuario)) {
        $sql .= "venta.id_usuario = $idUsuario ";        
    }
    $mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	echo $sql;
	echo '<br>';
	$listado = Venta::_generarListadoVenta($datos);
	echo json_encode($listado);
	exit;
}
/*
//$sql.= $finalSql;
//echo $sql;
$mysql = new MySQL();
$datos = $mysql->consultar($sql);
$mysql->desconectar();
$listado = Venta::_generarListadoVenta($datos);
echo json_encode($listado);
exit;
/*
function buscar(){
    let fechaDesde = $('#txtFechaDesde').val();
    let fechaHasta = $('#txtFechaHasta').val();
    let idProductoFinal = $('#cboIdProductoFinal').val();
    let idUsuario = $('#cboIdUsuario').val();
    console.log(idProductoFinal);
    $.ajax({
        type: 'GET',
        url : '../../utils/venta/buscarVenta.php',
        data: {
            'fechaDesde': fechaDesde,
            'fechaHasta': fechaHasta,
            'idProductoFinal': idProductoFinal,
            'idUsuario': idUsuario
        },
        success: function(data){
            var datos = JSON.parse(data);
            console.log(datos);
            $('#tablaInforme tbody tr').empty();
            for (var x=0; x < datos.length; x++){      
                if (idProductoFinal != 0){         
                  if (datos[x]._arrDetalleVenta._idProductoFinal == idProductoFinal){
                    row = generarFila(
                      datos[x]._fechaHoraEmision,
                      datos[x]._arrDetalleVenta.productoFinal._nombre,
                      datos[x]._idUsuario,
                      datos[x]._arrDetalleVenta._precio,
                      datos[x]._arrDetalleVenta._idProductoFinal
                    );
                  }                 
                } else {
                  row = generarFila(
                    datos[x]._fechaHoraEmision,
                    datos[x]._arrDetalleVenta.productoFinal._nombre,
                    datos[x]._idUsuario,
                    datos[x]._arrDetalleVenta._precio,
                    datos[x]._arrDetalleVenta._idProductoFinal
                  );
                }
            //$('#tablaInforme').append(row);
        }
      }
    })
  }
*/
?>