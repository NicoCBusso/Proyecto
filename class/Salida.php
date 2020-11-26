<?php 

require_once "MySQL.php";
require_once "Puesto.php";
require_once "DetalleVenta.php";
require_once "Producto.php";
class Salida {

	private $_idSalida;
	private $_idDetalleVenta;
	private $_fechaHoraEntrega;
	private $_codigoBarra;
	private $_idPuesto;

	public $detalle;
	public $puesto;

	public function guardar(){
		$sql = "INSERT INTO salida (id_salida,id_detalle_venta,codigo_barra,fecha_hora_entrega,id_puesto) VALUES (NULL,$this->_idDetalleVenta,$this->_codigoBarra,'$this->_fechaHoraEntrega',$this->_idPuesto)";

		$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idSalida = $idInsertado;
        //var_dump($sql);
	}
	public function guardarPorCodigoBarra(){
		$sql = "INSERT INTO salida (id_salida,codigo_barra,fecha_hora_entrega,id_puesto) VALUES (NULL,$this->_codigoBarra,'$this->_fechaHoraEntrega',$this->_idPuesto)";

		$mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idSalida = $idInsertado;
        //var_dump($sql);
	}

	private function _generarListado($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $salida = self::_generarSalida($registro);
            $listado[] = $salida;
            }
        return $listado;
    }

	public function _generarSalida ($registro){
    	$salida = new Salida();
    	$salida->_idSalida = $registro['id_salida'];
    	$salida->_idDetalleVenta = $registro['id_detalle_venta'];
    	$salida->_codigoBarra = $registro['codigo_barra'];
    	$salida->_fechaHoraEntrega = $registro['fecha_hora_entrega'];
    	$salida->_idPuesto = $registro['id_puesto'];
    	$salida->setDetalle();
    	$salida->setPuesto();
    	return $salida;
    }

    public static function obtenerTodos()
    {
        $sql= "SELECT * FROM salida";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);

        return $listado;
    }

    /**
     * @return mixed
     */
    public function getIdSalida()
    {
        return $this->_idSalida;
    }

    /**
     * @param mixed $_idSalida
     *
     * @return self
     */
    public function setIdSalida($_idSalida)
    {
        $this->_idSalida = $_idSalida;

        return $this;
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
    public function getCodigoBarra()
    {
        return $this->_codigoBarra;
    }

    /**
     * @param mixed $_codigoBarra
     *
     * @return self
     */
    public function setCodigoBarra($_codigoBarra)
    {
        $this->_codigoBarra = $_codigoBarra;

        return $this;
    }

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
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * @param mixed $detalle
     *
     * @return self
     */
    public function setDetalle()
    {
    	if (is_null($this->_idDetalleVenta)) {
             $this->detalle = Producto::obtenerPorCodigoBarra($this->_codigoBarra);
             return;
        }
        $this->detalle = DetalleVenta::obtenerPorId($this->_idDetalleVenta);

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
        $this->puesto = Puesto::obtenerPorId($this->_idPuesto);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaHoraEntrega()
    {
        return $this->_fechaHoraEntrega;
    }

    /**
     * @param mixed $_fechaHoraEntrega
     *
     * @return self
     */
    public function setFechaHoraEntrega($_fechaHoraEntrega)
    {
        $this->_fechaHoraEntrega = $_fechaHoraEntrega;

        return $this;
    }
}

?>