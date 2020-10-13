<?php

require_once "Solicitud.php";
require_once "Producto.php";

class DetalleSolicitud{

	private $_idDetalleSolicitud;
	private $_idSolicitud;
	private $_cantidad;
	private $_idProducto;

	public $producto;

	public function __construct($idProducto){
        $this->_idProducto = $idProducto;
    }

	public function guardar(){
        $sql = "INSERT INTO detallesolicitud (id_detalle_solicitud,cantidad,id_producto,id_solicitud) VALUES (NULL,$this->_cantidad,$this->_idProducto,$this->_idSolicitud);";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDetalleVenta = $idInsertado;
        var_dump($sql);
    }
    public function _generarDetalleSolicitud ($registro){
    	$detalleSolicitud = new DetalleSolicitud($registro['id_producto']);
    	$detalleSolicitud->_idDetalleSolicitud = $registro['id_detalle_solicitud'];
    	$detalleSolicitud->_idSolicitud = $registro['id_solicitud'];
    	$detalleSolicitud->_cantidad = $registro['cantidad'];
    	$detalleSolicitud->setProducto();
    	//highlight_string(var_export($detalleSolicitud,true));
    	return $detalleSolicitud;
    }
    
    private function _generarListado($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $detalleSolicitud = self::_generarDetalleSolicitud($registro);
            $listado[] = $detalleSolicitud;
            }
        return $listado;
    }

    public static function obtenerPorIdSolicitud($id){
    	$sql = "SELECT * FROM detallesolicitud INNER JOIN solicitud ON detallesolicitud.id_solicitud = solicitud.id_solicitud WHERE solicitud.id_solicitud = ".$id;
    	//var_dump($sql);

    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $detalleSolicitud = self::_generarListado($datos);

        return $detalleSolicitud;
    }

    /**
     * @return mixed
     */
    public function getIdDetalleSolicitud()
    {
        return $this->_idDetalleSolicitud;
    }

    /**
     * @param mixed $_idDetalleSolicitud
     *
     * @return self
     */
    public function setIdDetalleSolicitud($_idDetalleSolicitud)
    {
        $this->_idDetalleSolicitud = $_idDetalleSolicitud;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdSolicitud()
    {
        return $this->_idSolicitud;
    }

    /**
     * @param mixed $_idSolicitud
     *
     * @return self
     */
    public function setIdSolicitud($_idSolicitud)
    {
        $this->_idSolicitud = $_idSolicitud;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->_cantidad;
    }

    /**
     * @param mixed $_cantidad
     *
     * @return self
     */
    public function setCantidad($_cantidad)
    {
        $this->_cantidad = $_cantidad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->_idProducto;
    }

    /**
     * @param mixed $_idProducto
     *
     * @return self
     */
    public function setIdProducto($_idProducto)
    {
        $this->_idProducto = $_idProducto;

        return $this;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * @param mixed $producto
     *
     * @return self
     */
    public function setProducto()
    {
        $this->producto = Producto::obtenerPorId($this->_idProducto);

        return $this;
    }
}


?>