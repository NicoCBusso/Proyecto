<?php
require_once "../../../class/DetalleSolicitud.php";
session_start();
$usuario = $_POST['idUsuario'];
$puesto = $_POST['puesto'];
const EN_ESPERA = 1;
	$fechaHora = date("Y-m-d H:i:s");	
    $solicitud = new Solicitud(); // guardamos la cabecera
    $solicitud->setIdUsuario($usuario);
    $solicitud->setFechaHoraPedido($fechaHora);
    $solicitud->setIdEstado(EN_ESPERA);
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