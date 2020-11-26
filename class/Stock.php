<?php

require_once "Puesto.php";

class Stock{

  public $_idStock;
  public $_idProducto;
  public $_idPuesto;
  public $_stockActual;
  public $_stockMinimo;
  public $_totalStock;

  public $puesto;

  public static function obtenerParaSolicitud($idProducto){
      $sql = "SELECT stock.id_producto,id_stock,stock_actual,stock_minimo, id_puesto FROM stock "
           . "INNER JOIN producto ON producto.id_producto = stock.id_producto"
           . " WHERE producto.id_producto= ". $idProducto. " AND id_puesto = 4";
      //var_dump($sql);
      $mysql = new MySQL();
      $datos = $mysql->consultar($sql);
      $mysql->desconectar();
      
      $registro = $datos->fetch_assoc();

      if ($datos->num_rows > 0){
          $stock = self::_generarStock($registro);
          return $stock;
      } else {
          return;   
      } 
  }

  public static function obtenerPorIdProductoFinalNataliaNatalia($idProductoFinal,$idPuesto){
      $sql = "SELECT stock.id_producto,id_stock,stock_actual,stock_minimo,id_puesto"
            ." FROM productofinal INNER JOIN producto ON productofinal.id_producto_final = producto.id_producto_final"
            ." INNER JOIN stock ON producto.id_producto = stock.id_producto"
            ." WHERE productofinal.id_producto_final = ".$idProductoFinal." AND id_puesto = ".$idPuesto;
      //var_dump($sql);
      $mysql = new MySQL();
      $datos = $mysql->consultar($sql);
      $mysql->desconectar();
      
      if ($datos->num_rows > 0){
          $registro = $datos->fetch_assoc();
          $stock = self::_generarStock($registro);
          return $stock;
      } else {
          return;   
      }
  }

	public static function obtenerPorIdProductoFinal($idProductoFinal){
		$sql = "SELECT stock.id_producto,id_stock,stock_minimo, id_puesto, SUM(stock_actual) as stock_actual  FROM stock "
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
      //var_dump($sql);

  }

  public function descontar($cantidad){
      $cantidad = $this->_stockActual - $cantidad;
      $sql = "UPDATE stock SET stock_actual =" . $cantidad ." WHERE id_producto = $this->_idProducto AND id_puesto = $this->_idPuesto";
      $mysql = new MySQL();
      $mysql->actualizar($sql);
      //var_dump($sql);

  }
  //Posiblemente se borre
  public static function obtenerPorIdProducto($idProducto,$idPuesto){
      $sql = "SELECT * FROM stock WHERE id_producto = " . $idProducto . " AND id_puesto = ". $idPuesto;
      $mysql = new MySQL();
      $datos = $mysql->consultar($sql);
      $mysql->desconectar();
      //var_dump($sql);
      if ($datos->num_rows > 0){
        $registro = $datos->fetch_assoc();
        $stock = self::_generarStock($registro);
        return $stock;
      } else {
          return;   
      }        
  }

  public static function consultarStock($idProducto){
      $sql = "SELECT * FROM stock WHERE id_producto = " . $idProducto;
      $mysql = new MySQL();
      $datos = $mysql->consultar($sql);
      $mysql->desconectar();

      if ($datos->num_rows > 0){
          $stock = self::_generarListadoStock($datos);
          return $stock;
      } else {
          return;   
      }
  }

  private function _generarListadoStock($datos){
      $listado = array();
      while ($registro = $datos->fetch_assoc()) {
          $stock = self::_generarStock($registro);
          $listado[] = $stock;
      }
      return $listado;
  }

	private function _generarStock($registro){
		$stock = new Stock();
		$stock->_idStock = $registro['id_stock'];
		$stock->_idProducto = $registro['id_producto'];
		$stock->_stockActual = $registro['stock_actual'];
		$stock->_stockMinimo = $registro['stock_minimo'];
    $stock->_idPuesto = $registro['id_puesto'];
    //$stock->_totalStock = $registro['total_producto'];
    $stock->setPuesto();
		return $stock;
	}
  public static function obtenerStockIngredientesTragos($idProductoFinal){

    $sql= "SELECT stock.id_stock,trago.id_producto_final,"
            ."stock.id_producto,"
            ."stock_minimo,"
            ."id_puesto,"
            ."SUM(producto.contenido*stock_actual) DIV producto_trago.cantidad AS stock_actual"
            ." FROM stock" 
            ." INNER JOIN producto_trago ON stock.id_producto = producto_trago.id_producto"
            ." INNER JOIN trago ON trago.id_trago = producto_trago.id_trago"
            ." INNER JOIN producto ON producto.id_producto = producto_trago.id_producto"
            ." WHERE trago.id_producto_final= ".$idProductoFinal." GROUP BY stock.id_producto"
            ." ORDER BY stock_actual ASC LIMIT 1";
    //var_dump($sql);
    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);
    $mysql->desconectar();

    
    if ($datos->num_rows > 0){
        $registro = $datos->fetch_assoc();
        $stock = self::_generarStock($registro);
        return $stock;
    } else {
        return;   
    }
  }

  public static function obtenerListadoPorPuesto($idPuesto){
    $sql = "SELECT productofinal.id_producto_final,productofinal.descripcion,stock.stock_actual"
           ." FROM stock INNER JOIN producto ON stock.id_producto = producto.id_producto"
           ." INNER JOIN productofinal ON producto.id_producto_final = productofinal.id_producto_final"
           ." WHERE stock.id_puesto =". $idPuesto;

    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);
    $mysql->desconectar();

    $listado = array();
    while($r = mysqli_fetch_assoc($datos)) {
        $listado[] = $r;
    }
    return $listado;
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