<?php

require_once "Usuario.php";
require_once "DetalleCompra.php";

class Compra {

	private $_idCompra;
	private $_idUsuario;
    private $_idProveedor;
    private $_idTipoComprobante;
	private $_arrDetalleCompra;
	private $_fechaHoraEmision;
    private $_estado;
	private $_total;

	public $usuario;
    public $proveedor;

    public function __construct(){
        $this->_estado = 1;
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
    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }

    /**
     * @param mixed $_idUsuario
     *
     * @return self
     */
    public function setIdUsuario($_idUsuario)
    {
        $this->_idUsuario = $_idUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArrDetalleCompra()
    {
        return $this->_arrDetalleCompra;
    }

    /**
     * @param mixed $_arrDetalleCompra
     *
     * @return self
     */

    public function setArrDetalleCompra()
    {
        $this->_arrDetalleCompra = DetalleCompra::obtenerPorIdCompra($this->_idCompra);

        return $this;
    }
    public function addDetalleFactura($detalleFactura) {
        $this->_arrDetalleCompra[] = $detalleFactura;
    }

    /**
     * @return mixed
     */
    public function getFechaHoraEmision()
    {
        return $this->_fechaHoraEmision;
    }

    /**
     * @param mixed $_fechaHoraEmision
     *
     * @return self
     */
    public function setFechaHoraEmision($_fechaHoraEmision)
    {
        $this->_fechaHoraEmision = $_fechaHoraEmision;

        return $this;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     *
     * @return self
     */
    public function setUsuario()
    {
        $this->usuario = Usuario::obtenerPorId($this->_idUsuario);

        return $this;
    }
    public function guardar(){
        $sql = "INSERT INTO compra (id_compra,fecha,id_proveedor,id_usuario,id_tipo_comprobante,estado) VALUES (NULL,'$this->_fechaHoraEmision',$this->_idProveedor,$this->_idUsuario,$this->_idTipoComprobante,$this->_estado);";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idCompra= $idInsertado;
        var_dump($sql);        
    }

    public function _generarCompra($registro){
    	$compra = new Compra();
    	$compra->_idCompra = $registro['id_compra'];
    	$compra->_idUsuario = $registro['id_usuario'];
        $compra->_idProveedor = $registro['id_proveedor'];
    	$compra->setArrDetalleCompra();
    	$compra->_fechaHoraEmision = $registro['fecha'];
        $compra->_estado = $registro['estado'];
        $compra->setTotal();    	
    	$compra->setUsuario();
        $compra->setProveedor();

    	return $compra;
    }

    public function _generarListadoCompra($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $compra = self::_generarCompra($registro);
            $listado[] = $compra;
            }
        return $listado;
    }

    public static function obtenerTodos(){
    	$sql = "SELECT * FROM compra";
    	//var_dump($sql);
    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoCompra($datos);

        return $listado;
    }

    public static function obtenerPorId($id){
    	$sql = "SELECT * FROM compra WHERE id_compra = ". $id;

    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
        $registro = $datos->fetch_assoc();

        $compra = self::_generarCompra($registro);
        return $compra;
    }
    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->_total;
    }

    /**
     * @param mixed $_total
     *
     * @return self
     */
    public function setTotal()
    {
        $total = 0;
        foreach ($this->_arrDetalleCompra as $detalleCompra) {
            $total = $total+$detalleCompra->getPrecio();;
        }
        $this->_total = $total;

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
    public function getIdTipoComprobante()
    {
        return $this->_idTipoComprobante;
    }

    /**
     * @param mixed $_idTipoComprobante
     *
     * @return self
     */
    public function setIdTipoComprobante($_idTipoComprobante)
    {
        $this->_idTipoComprobante = $_idTipoComprobante;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->_idProveedor;
    }

    /**
     * @param mixed $_idProveedor
     *
     * @return self
     */
    public function setIdProveedor($_idProveedor)
    {
        $this->_idProveedor = $_idProveedor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * @param mixed $proveedor
     *
     * @return self
     */
    public function setProveedor()
    {
        $this->proveedor = Proveedor::obtenerPorId($this->_idProveedor);

        return $this;
    }
}

?>