<?php

require_once "Venta.php";
require_once "ProductoFinal.php";


class DetalleVenta{

	public $_idDetalleVenta;
	public $_idVenta;
	public $_idProductoFinal;
	public $_estado;
	public $_precio;

	public $productoFinal;
	public $venta;
    
    const SIN_CONSUMIR = 1;
    const CONSUMIDO = 2;
    const ANULADO = 3;

    public function __construct($idProductoFinal){
        $this->_idProductoFinal = $idProductoFinal;
    }
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
    public function getIdVentaa()
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
    public function setPrecio()
    {
        $this->_precio = $this->productoFinal->getPrecioVenta();

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
    public function guardar(){
        $sql = "INSERT INTO detalleventa (id_detalle_venta,id_venta,id_producto_final,precio,estado) VALUES (NULL,$this->_idVenta,$this->_idProductoFinal,$this->_precio,$this->_estado);";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDetalleVenta = $idInsertado;
        //var_dump($sql);
    }

    public function cambiarEstadoConsumido(){
        $sql = "UPDATE detalleventa SET estado = 2 WHERE id_detalle_venta = $this->_idDetalleVenta";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        //var_dump($sql);
    }

    public function cancelar(){
        $sql = "UPDATE detalleventa SET estado = $this->_estado WHERE id_detalle_venta = $this->_idDetalleVenta";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        var_dump($sql);
    }
    public function _generarDetalleVenta ($registro){
    	$detalleVenta = new DetalleVenta($registro['id_producto_final']);
    	$detalleVenta->_idDetalleVenta = $registro['id_detalle_venta'];
    	$detalleVenta->_idVenta = $registro['id_venta'];
    	$detalleVenta->_precio = $registro['precio'];
    	$detalleVenta->_estado = $registro['estado'];
    	$detalleVenta->setProductoFinal();
    	return $detalleVenta;
    }
    
    public function _generarListadoDetalleVenta($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $detalleVenta = self::_generarDetalleVenta($registro);
            $listado[] = $detalleVenta;
            }
        return $listado;
    }

    public static function validarEstado($idDetalleVenta){
        $sql = "SELECT estado FROM detalleventa WHERE id_detalle_venta = ".$idDetalleVenta." AND estado = 2" ;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($datos->num_rows > 0 ) {
            $mensaje = "<span style='font-weight:bold;color:red;'>Consumicion ya utilizada</span>";
            //  
            //header('Location: ../alta.php');
            return $mensaje;
            exit;
        }

    }

    public static function obtenerPorId($id){
        $sql = "SELECT * FROM detalleventa WHERE id_detalle_venta = ".$id;
        //var_dump($sql);

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($datos->num_rows > 0){
            $registro = $datos->fetch_assoc();
            $detalleVenta = self::_generarDetalleVenta($registro);
            return $detalleVenta;
        } else {
            return;   
        }
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

    public static function informeConsumicion($id){
        $sql = "SELECT * FROM detalleventa INNER JOIN venta ON detalleventa.id_venta = venta.id_venta WHERE venta.id_venta = ".$id;
        //var_dump($sql);

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $detalleVenta = self::_generarDetalleVenta($registro);

        return $detalleVenta;
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
    public function getIdVenta()
    {
        return $this->_idVenta;
    }
}

?>