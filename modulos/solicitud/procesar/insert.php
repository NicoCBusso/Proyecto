<?php
require_once "../../../class/DetalleSolicitud.php";
session_start();
$usuarioLogueado = $_SESSION['usuario'];
$puesto = $_POST['puesto'];
	$fechaHora = date("Y-m-d H:i:s");	
    $solicitud = new Solicitud(); // guardamos la cabecera
    $solicitud->setIdUsuario(1);
    $solicitud->setFechaHoraPedido($fechaHora);
    $solicitud->setEstado(1);
    $solicitud->setIdPuesto($puesto);
    var_dump($solicitud);
    $solicitud->guardar();
    //highlight_string(var_export($solicitud,true));
   //$detalleSolicitud = new DetalleSolicitud(); // guardamos los detalles
   
    foreach($_POST['items'] as $item){        	
    	$detalleSolicitud = new DetalleSolicitud($item['id_producto']);
		$detalleSolicitud->setIdSolicitud($solicitud->getIdSolicitud());
        $detalleSolicitud->setCantidad($item['cantidad']);
		$detalleSolicitud->guardar();       
    }
//header("location: ../alta.php");
?>