<?php

require_once "Venta.php";
require_once "ProductoFinal.php";


class DetalleVenta{

	private $_idDetalleVenta;
	private $_idVenta;
	private $_idProductoFinal;
	private $_estado;
	private $_precio;

	public $productoFinal;
	public $venta;



    /**
     * @return mixed
     */
    public function getIdDetalleVenta()
    {
        return $this->_idDetalleVenta;
    }

    /**
     * @param mixed $_idDetalleVenta
     *
     * @return self
     */
    public function setIdDetalleVenta($_idDetalleVenta)
    {
        $this->_idDetalleVenta = $_idDetalleVenta;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->_idVenta;
    }

    /**
     * @param mixed $_idVenta
     *
     * @return self
     */
    public function setIdVenta($_idVenta)
    {
        $this->_idVenta = $_idVenta;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProductoFinal()
    {
        return $this->_idProductoFinal;
    }

    /**
     * @param mixed $_idProductoFinal
     *
     * @return self
     */
    public function setIdProductoFinal($_idProductoFinal)
    {
        $this->_idProductoFinal = $_idProductoFinal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * @param mixed $_estado
     *
     * @return self
     */
    public function setEstado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->_precio;
    }

    /**
     * @param mixed $_precio
     *
     * @return self
     */
    public function setPrecio($_precio)
    {
        $this->_precio = $_precio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductoFinal()
    {
        return $this->productoFinal;
    }

    /**
     * @param mixed $productoFinal
     *
     * @return self
     */
    public function setProductoFinal()
    {
        $this->productoFinal = ProductoFinal::obtenerPorId($this->_idProductoFinal);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVenta()
    {
        return $this->venta;
    }

    /**
     * @param mixed $venta
     *
     * @return self
     */
    public function setVenta()
    {
        $this->venta = Venta::obtenerPorId($this->_idVenta);

        return $this;
    }

    public function _generarDetalleVenta ($registro){
    	$detalleVenta = new DetalleVenta();
    	$detalleVenta->_idDetalleVenta = $registro['id_detalle_venta'];
    	$detalleVenta->_idVenta = $registro['id_venta'];
    	$detalleVenta->_idProductoFinal = $registro['id_producto_final'];
    	$detalleVenta->_precio = $registro['precio'];
    	$detalleVenta->_estado = $registro['estado'];
    	$detalleVenta->setProductoFinal();
    	//$detalleVenta->setVenta();
    	//highlight_string(var_export($detalleVenta,true));
    	return $detalleVenta;
    }

    private function _generarListadoDetalleVenta($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $detalleVenta = self::_generarDetalleVenta($registro);
            $listado[] = $detalleVenta;
            }
        return $listado;
    }

    public static function obtenerPorIdVenta($id){
    	$sql = "SELECT * FROM detalleventa INNER JOIN venta ON detalleventa.id_venta = venta.id_venta WHERE venta.id_venta = ".$id;
    	//var_dump($sql);

    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $detalleVenta = self::_generarListadoDetalleVenta($datos);

        return $detalleVenta;
    }
    
}

?>