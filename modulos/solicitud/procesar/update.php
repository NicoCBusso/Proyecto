<?php
require_once "../../../class/DetalleSolicitud.php";
session_start();
$idSolicitud = $_POST['id'];
$accion = $_POST['accion'];
$solicitud = Solicitud::obtenerPorId($idSolicitud);
if ($accion == 3){
    
    $fechaHora = date("Y-m-d H:i:s");	
    $deposito = 4;
    $solicitud->setFechaHoraEntrega($fechaHora);
    $solicitud->setIdEstado($accion);
    $solicitud->actualizar();

        foreach($solicitud->getArrDetalleSolicitud() as $detalleSolicitud)
        {
            $stockDeposito = Stock::obtenerPorIdProducto($detalleSolicitud->getIdProducto(),$deposito);
            $stockDeposito->descontar($detalleSolicitud->getCantidad());
            $stockPuesto = Stock::obtenerPorIdProducto($detalleSolicitud->getIdProducto(),$solicitud->getIdPuesto());
            if ($stockPuesto == NULL){
                $stockPuesto = new Stock();
                $stockPuesto->setIdProducto($detalleSolicitud->getIdProducto());
                $stockPuesto->setStockActual($detalleSolicitud->getCantidad());
                $stockPuesto->setIdPuesto($solicitud->getIdPuesto());        
                $stockPuesto->guardar();
            } else{
                $stockPuesto->actualizar($detalleSolicitud->getCantidad());
            }        
        	       
        }
}elseif ($accion == 2) {
    $solicitud->setIdEstado($accion);
    $solicitud->actualizar($accion);
}


//header("location: ../alta.php");
?>