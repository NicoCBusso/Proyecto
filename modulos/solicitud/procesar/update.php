<?php
require_once "../../../class/DetalleSolicitud.php";
session_start();
$idSolicitud = $_POST['id'];
$accion = $_POST['accion'];
$solicitud = Solicitud::obtenerPorId($idSolicitud);

const EN_PROCESO = 2;
const FINALIZADO = 3;
const PUESTO_DEPOSITO = 4;

if ($accion == FINALIZADO){
    
    $fechaHora = date("Y-m-d H:i:s");	
    $deposito = PUESTO_DEPOSITO;
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
}elseif ($accion == EN_PROCESO) {
    $solicitud->setIdEstado($accion);
    $solicitud->actualizar($accion);
}


//header("location: ../alta.php");
?>