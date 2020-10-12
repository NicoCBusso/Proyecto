<?php

require_once "Puesto.php";

class Stock{

	public $_idStock;
	public $_idProducto;
    public $_idPuesto;
	public $_stockActual;
	public $_stockMinimo;

    public $puesto;

	public static function obtenerPorIdProductoFinal($idProductoFinal){
		$sql = "SELECT stock.id_producto,id_stock, stock_actual, stock_minimo, id_puesto ,SUM(stock_actual) as total_producto FROM stock "
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
    public function guardar(){
        $sql = "INSERT INTO stock (id_stock,id_producto,stock_actual,id_puesto) VALUES (NULL,$this->_idProducto,$this->_stockActual,$this->_idPuesto)";
        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idStock= $idInsertado;
    }
    public function actualizar($cantidad){
        $cantidad = $this->_stockActual + $cantidad;
        $sql = "UPDATE stock SET stock_actual =" . $cantidad ." WHERE id_producto = $this->_idProducto AND id_puesto = $this->_idPuesto";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        var_dump($sql);

    }

    public static function obtenerPorIdProducto($idProducto,$idPuesto){
        $sql = "SELECT * FROM stock WHERE id_producto = " . $idProducto . " AND id_puesto = ". $idPuesto;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
        var_dump($sql);
        $registro = $datos->fetch_assoc();
        if ($datos->num_rows > 0){
            $stock = self::_generarStock($registro);
            return $stock;
        } else {
            return;   
        }        
    }

	private function _generarStock($registro){
		$stock = new Stock();
		$stock->_idStock = $registro['id_stock'];
		$stock->_idProducto = $registro['id_producto'];
		$stock->_stockActual = $registro['stock_actual'];
		$stock->_stockMinimo = $registro['stock_minimo'];
        $stock->_idPuesto = $registro['id_puesto'];
        $stock->setPuesto();
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

    /**
     * @return mixed
     */
    public function getIdPuesto()
    {
        return $this->_idPuesto;
    }

    /**
     * @param mixed $_idPuesto
     *
     * @return self
     */
    public function setIdPuesto($_idPuesto)
    {
        $this->_idPuesto = $_idPuesto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * @param mixed $puesto
     *
     * @return self
     */
    public function setPuesto()
    {
        if (is_null($this->_idPuesto)) {
            return;
        }
        $this->puesto = Puesto::obtenerPorId($this->_idPuesto);

        return $this;
    }
}

?>