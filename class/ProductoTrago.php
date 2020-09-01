    <?php
require_once "Producto.php";
require_once "Trago.php";
require_once "MySQL.php";
class ProductoTrago{
	private $_idProductoTrago;
	private $_idTrago;
	private $_idProducto;
	private $_cantidad;
	public $producto;

    public function __construct($cantidad){
        $this->_cantidad = $cantidad;
    }

	public function guardar(){
		$sql = "INSERT INTO producto_trago (id_producto_trago, id_producto, id_trago, cantidad) VALUES (NULL, $this->_idProducto, $this->_idTrago, $this->_cantidad)";
        var_dump($sql);
        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        echo $idInsertado;

        $this->_idProductoTrago = $idInsertado;
	}
    public function actualizar(){
        $sql = "UPDATE producto_trago SET cantidad = $this->_cantidad, id_producto = $this->_idProducto WHERE id_producto_trago = $this->_idProductoTrago";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    public function eliminar(){
        $sql = "DELETE FROM producto_trago WHERE id_producto_trago = $this->_idProductoTrago AND id_trago = $this->_idTrago;";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
	public static function obtenerPorIdTrago($idTrago){
		$sql = "SELECT * FROM trago INNER JOIN producto_trago on trago.id_trago = producto_trago.id_trago WHERE trago.id_trago =". $idTrago;

		$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProductoTrago($datos);
        return $listado;

	}
    public static function  obtenerPorId($id){
        $sql="SELECT * FROM producto_trago WHERE id_producto_trago =". $id;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
        $registro = $datos->fetch_assoc();

        $productoTrago = self::_generarProductoTrago($registro);
        return $productoTrago;
    }
	private function _generarListadoProductoTrago($datos){
		$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$productoTrago = self::_generarProductoTrago($registro);
			$listado[] = $productoTrago;
		}
		return $listado;
	}

	private function _generarProductoTrago($registro){
		$productoTrago = new ProductoTrago($registro['cantidad']);
		$productoTrago->_idProductoTrago = $registro['id_producto_trago'];
		$productoTrago->_idProducto = $registro['id_producto'];
		$productoTrago->_idTrago = $registro['id_trago'];
		$productoTrago->setProducto();
		return $productoTrago; 
	}

    /**
     * @return mixed
     */
    public function getIdProductoTrago()
    {
        return $this->_idProductoTrago;
    }

    /**
     * @param mixed $_idProductoTrago
     *
     * @return self
     */
    public function setIdProductoTrago($_idProductoTrago)
    {
        $this->_idProductoTrago = $_idProductoTrago;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdTrago()
    {
        return $this->_idTrago;
    }

    /**
     * @param mixed $_idTrago
     *
     * @return self
     */
    public function setIdTrago($_idTrago)
    {
        $this->_idTrago = $_idTrago;

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
}

?>