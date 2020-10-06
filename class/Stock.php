<?php

class Stock{

	public $_idStock;
	public $_idProducto;
	public $_stockActual;
	public $_stockMinimo;
	public $_lugar;

	public static function obtenerPorIdProductoFinal($idProductoFinal){
		$sql = "SELECT stock.id_producto,id_stock, stock_actual, stock_minimo, lugar ,SUM(stock_actual) as total_producto FROM stock "
			 . "INNER JOIN producto ON producto.id_producto = stock.id_producto"
			 . " WHERE producto.id_producto_final= ". $idProductoFinal;
		//var_dump($sql);
		$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $stock = self::_generarStock($registro);

        return $stock;
	}
    public function actualizar($lugar,$idProducto,$cantidad){
        $sql = "UPDATE stock SET stock_actual = stock_actual+$cantidad "
            ." WHERE id_producto = $idProducto AND lugar = $lugar";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        var_dump($sql);

    }

	private function _generarStock($registro){
		$stock = new Stock();
		$stock->_idStock = $registro['id_stock'];
		$stock->_idProducto = $registro['id_producto'];
		$stock->_stockActual = $registro['total_producto'];
		$stock->_stockMinimo = $registro['stock_minimo'];
		$stock->_lugar = $registro['lugar'];
		return $stock;
	}
    /**
     * @return mixed
     */
    public function getIdStock()
    {
        return $this->_idStock;
    }

    /**
     * @param mixed $_idStock
     *
     * @return self
     */
    public function setIdStock($_idStock)
    {
        $this->_idStock = $_idStock;

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
    public function getStockActual()
    {
        return $this->_stockActual;
    }

    /**
     * @param mixed $_stockActual
     *
     * @return self
     */
    public function setStockActual($_stockActual)
    {
        $this->_stockActual = $_stockActual;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStockMinimo()
    {
        return $this->_stockMinimo;
    }

    /**
     * @param mixed $_stockMinimo
     *
     * @return self
     */
    public function setStockMinimo($_stockMinimo)
    {
        $this->_stockMinimo = $_stockMinimo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLugar()
    {
        return $this->_lugar;
    }

    /**
     * @param mixed $_lugar
     *
     * @return self
     */
    public function setLugar($_lugar)
    {
        $this->_lugar = $_lugar;

        return $this;
    }
}

?>