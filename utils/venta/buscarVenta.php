<?php
require_once "../../class/MySQL.php";
require_once "../../class/Venta.php";
require_once "../../class/DetalleVenta.php";

$fechaDesde = $_GET['fechaDesde'];
$fechaHasta = $_GET['fechaHasta'];
$idProductoFinal = $_GET['idProductoFinal'];
$idUsuario = $_GET['idUsuario'];
$estado = $_GET['estado'];

$sql = "SELECT detalleventa.id_venta,"
			."venta.fecha_hora_emision,"
			."detalleventa.id_producto_final,"
			."productofinal.descripcion,"
			."detalleventa.precio,"
			."usuario.username,"
			."detalleventa.estado"
		." FROM venta INNER JOIN detalleventa ON venta.id_venta = detalleventa.id_venta"
		." INNER JOIN usuario ON usuario.id_usuario = venta.id_usuario"
		." INNER JOIN productofinal ON productofinal.id_producto_final = detalleventa.id_producto_final WHERE ";

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
		if (isset($estado)) {
		    if (!empty($estado)) {
		        $sql .= "AND detalleventa.estado = '$estado' ";        
		    }
		}    
	}
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	//echo $sql;
	//echo '<br>';
	$listado = array();
    while($r = mysqli_fetch_assoc($datos)) {
        $listado[] = $r;
    }
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
		if (isset($estado)) {
		    if (!empty($estado)) {
		        $sql .= "AND detalleventa.estado = '$estado' ";        
		    }
		}  
		$mysql = new MySQL();
		$datos = $mysql->consultar($sql);
		$mysql->desconectar();
		//echo $sql;
		//echo '<br>';
		$listado = array();
	    while($r = mysqli_fetch_assoc($datos)) {
	        $listado[] = $r;
	    }
		echo json_encode($listado);
		exit;     
    }
}
if (isset($idUsuario)) {
    if (!empty($idUsuario)) {
        $sql .= "venta.id_usuario = $idUsuario "; 
        if (isset($estado)) {
		    if (!empty($estado)) {
		        $sql .= "AND detalleventa.estado = '$estado' ";        
		    }
		}
		$mysql = new MySQL();
		$datos = $mysql->consultar($sql);
		$mysql->desconectar();
		//echo $sql;
		//echo '<br>';
		$listado = array();
	    while($r = mysqli_fetch_assoc($datos)) {
	        $listado[] = $r;
	    }
		echo json_encode($listado);
		exit;         
    }    
}

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
              console.log(datos);
              for (var y=0; y < datos[x]._arrDetalleVenta.length; y++){   
                if (idProductoFinal != 0){        
                  if (datos[x]._arrDetalleVenta[y]._idProductoFinal = idProductoFinal){
                    row = generarFila(
                      datos[x]._fechaHoraEmision,
                      datos[x]._arrDetalleVenta[y].productoFinal._nombre,
                      datos[x].usuario._username,
                      datos[x]._arrDetalleVenta[y]._precio,
                      datos[x]._arrDetalleVenta[y]._idProductoFinal
                    );
                  }                 
                } else {
                  row = generarFila(
                    datos[x]._fechaHoraEmision,
                    datos[x]._arrDetalleVenta[y].productoFinal._nombre,
                    datos[x].usuario._username,
                    datos[x]._arrDetalleVenta[y]._precio,
                    datos[x]._arrDetalleVenta[y]._idProductoFinal
                  );
                }
              }
            $('#tablaInforme tbody tr:last').after(row);
        }
      }
    })
  }
*/
?>