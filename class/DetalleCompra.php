<?php

require_once "Compra.php";
require_once "Producto.php";


class DetalleCompra{

	private $_idDetalleCompra;
	private $_idCompra;
	private $_idProducto;
    private $_cantidad;
	private $_precio;

	public $producto;
	public $compra;


    public function __construct($idProducto){
        $this->_idProducto = $idProducto;
    }
    /**
     * @return mixed
     */
    public function getIdDetalleCompra()
    {
        return $this->_idDetalleCompra;
    }

    /**
     * @param mixed $_idDetalleCompra
     *
     * @return self
     */
    public function setIdDetalleCompra($_idDetalleCompra)
    {
        $this->_idDetalleCompra = $_idDetalleCompra;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCompra()
    {
        return $this->_idCompra;
    }

    /**
     * @param mixed $_idCompra
     *
     * @return self
     */
    public function setIdCompra($_idCompra)
    {
        $this->_idCompra = $_idCompra;

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
    public function getPrecio()
    {
        return $this->_precio;
    }

    /**
     * @param mixed $_precio
     *
     * @return self
     */
    public function setPrecio()
    {
        $this->_precio = $this->producto->getPrecioCompra();

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
     * @param mixed $Producto
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
    public function getCompra()
    {
        return $this->compra;
    }

    /**
     * @param mixed $Compra
     *
     * @return self
     */
    public function setCompra()
    {
        $this->compra = Compra::obtenerPorId($this->_idCompra);

        return $this;
    }
    public function guardar(){
        $sql = "INSERT INTO detallecompra (id_detalle_compra,id_compra,id_producto,cantidad,precio) VALUES (NULL,$this->_idCompra,$this->_idProducto,$this->_cantidad,$this->_precio);";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDetalleCompra = $idInsertado;
        var_dump($sql);
    }
    public function _generarDetalleCompra ($registro){
    	$detalleCompra = new DetalleCompra($registro['id_producto']);
    	$detalleCompra->_idDetalleCompra = $registro['id_detalle_compra'];
    	$detalleCompra->_idCompra = $registro['id_compra'];
    	$detalleCompra->_precio = $registro['precio'];
        $detalleCompra->_cantidad = $registro['cantidad'];
    	$detalleCompra->setProducto();
    	//$detalleCompra->setCompra();
    	//highlight_string(var_export($detalleCompra,true));
    	return $detalleCompra;
    }
    
    private function _generarListadoDetalleCompra($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $detalleCompra = self::_generarDetalleCompra($registro);
            $listado[] = $detalleCompra;
            }
        return $listado;
    }

    public static function obtenerPorIdCompra($id){
    	$sql = "SELECT * FROM detallecompra INNER JOIN venta ON detallecompra.id_Compra = venta.id_Compra WHERE venta.id_Compra = ".$id;
    	//var_dump($sql);

    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $detalleCompra = self::_generarListadoDetalleCompra($datos);

        return $detalleCompra;
    }
    private function consultarStock($id){
        $sql = "SELECT SUM(unidad) FROM stock WHERE id_producto =". $id;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        return $datos;
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