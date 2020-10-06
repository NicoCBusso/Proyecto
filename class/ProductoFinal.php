<?php
require_once 'MySQL.php';
require_once 'Stock.php';

class ProductoFinal{
	public $_idProductoFinal;
	public $_nombre;
	public $_precioVenta;
    
    public $stock;

	public function __construct($nombre){
		$this->_nombre = $nombre;
	}

    public function _generarProductoFinal($registro){
    	$productoFinal = new ProductoFinal($registro['descripcion']);
    	$productoFinal->_idProductoFinal = $registro['id_producto_final'];
    	$productoFinal->_precioVenta = $registro['precio_venta'];
        $productoFinal->setStock();
    	return $productoFinal;
    }

    public function guardar(){
    	$sql = "INSERT INTO productofinal (id_producto_final,precio_venta,descripcion) VALUES (NULL,$this->_precioVenta,'$this->_nombre')";
    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idProductoFinal= $idInsertado;
        var_dump($sql);
        echo "insertado"; 
    }

    public function actualizar(){
        $sql =  "UPDATE productofinal SET precio_venta = $this->_precioVenta, descripcion = '$this->_nombre' WHERE id_producto_final = $this->_idProductoFinal";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    
    public static function obtenerPorId($id){
        $sql = "SELECT * FROM productofinal WHERE id_producto_final =". $id;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $productoFinal = self::_generarProductoFinal($registro);

        return $productoFinal;
    }
    public static function obtenerTodos(){
        $sql = "SELECT * FROM productofinal";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProductoFinal($datos);

        return $listado;
    }

    public static function buscarPorDescripcion($descripcion){
        $sql = "SELECT * FROM productofinal WHERE descripcion LIKE '%".$descripcion."%'";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProductoFinal($datos);

        return $listado;
    }


    private function _generarListadoProductoFinal($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $productoFinal = self::_generarProductoFinal($registro);
            $listado[] = $productoFinal;
        }
        return $listado;
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
    public function getNombre()
    {
        return $this->_nombre;
    }

    /**
     * @param mixed $_nombre
     *
     * @return self
     */
    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecioVenta()
    {
        return $this->_precioVenta;
    }

    /**
     * @param mixed $_precioVenta
     *
     * @return self
     */
    public function setPrecioVenta($_precioVenta)
    {
        $this->_precioVenta = $_precioVenta;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     *
     * @return self
     */
    public function setStock()
    {
        $this->stock = Stock::obtenerPorIdProductoFinal($this->_idProductoFinal);

        return $this;
    }
}
?>