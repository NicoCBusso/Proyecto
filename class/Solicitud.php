<?php

require_once "MySQL.php";
require_once "Puesto.php";
require_once "Usuario.php";
require_once "DetalleSolicitud.php";
require_once "Estado.php";

class Solicitud {

	private $_idSolicitud;
	private $_idUsuario;
	private $_arrDetalleSolicitud;
	private $_fechaHoraPedido;
	private $_fechaHoraEntrega;
	private $_idEstado;
	private $_idPuesto;

	public $puesto;
	public $usuario;
	public $estado;

	public function guardar(){
        $sql = "INSERT INTO solicitud (id_solicitud,id_usuario,fecha_hora_pedido,id_estado,id_puesto) VALUES (NULL,$this->_idUsuario,'$this->_fechaHoraPedido',$this->_idEstado,$this->_idPuesto)";
        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idSolicitud= $idInsertado;
        var_dump($sql);
    }


    public function actualizar(){
    	$sql = "UPDATE solicitud SET id_estado = '$this->_idEstado', fecha_hora_entrega = '$this->_fechaHoraEntrega' WHERE id_solicitud = $this->_idSolicitud";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        var_dump($sql);
    }

    public static function obtenerTodos(){
    	$sql = "SELECT * FROM solicitud";
    	//var_dump($sql);
    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);

        return $listado;
    }

    public static function obtenerPorId($id){
    	$sql = "SELECT * FROM solicitud WHERE id_solicitud = ". $id;

    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
        $registro = $datos->fetch_assoc();

        $solicitud = self::_generarSolicitud($registro);
        return $solicitud;
    }

    public function _generarListado($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $solicitud = self::_generarSolicitud($registro);
            $listado[] = $solicitud;
            }
        return $listado;
    }

    public static function obtenerPorIdProducto($idProducto,$idPuesto){
        $sql = "SELECT * FROM solicitud WHERE id_producto = " . $idProducto . " AND id_puesto = ". $idPuesto;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
        var_dump($sql);
        $registro = $datos->fetch_assoc();
        if ($datos->num_rows > 0){
            $solicitud = self::_generarSolicitud($registro);
            return $solicitud;
        } else {
            return;   
        }        
    }

	private function _generarSolicitud($registro){
		$solicitud = new Solicitud();
		$solicitud->_idSolicitud = $registro['id_solicitud'];
		$solicitud->_idUsuario = $registro['id_usuario'];
		$solicitud->_fechaHoraPedido = $registro['fecha_hora_pedido'];
		$solicitud->_fechaHoraEntrega = $registro['fecha_hora_entrega'];
        $solicitud->_idPuesto = $registro['id_puesto'];
        $solicitud->_idEstado = $registro['id_estado'];
        $solicitud->setArrDetalleSolicitud();
        $solicitud->setPuesto();
        $solicitud->setUsuario();
        $solicitud->setEstado();
		return $solicitud;
	}

    /**
     * @return mixed
     */
    public function getIdSolicitud()
    {
        return $this->_idSolicitud;
    }

    /**
     * @param mixed $_idSolicitud
     *
     * @return self
     */
    public function setIdSolicitud($_idSolicitud)
    {
        $this->_idSolicitud = $_idSolicitud;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaHoraPedido()
    {
        return $this->_fechaHoraPedido;
    }

    /**
     * @param mixed $_fechaHoraPedido
     *
     * @return self
     */
    public function setFechaHoraPedido($_fechaHoraPedido)
    {
        $this->_fechaHoraPedido = $_fechaHoraPedido;

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

    /**
     * @return mixed
     */
    public function getIdEstado()
    {
        return $this->_estado;
    }

    /**
     * @param mixed $_estado
     *
     * @return self
     */
    public function setIdEstado($_idEstado)
    {
        $this->_idEstado = $_idEstado;

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

    /**
     * @return mixed
     */
    public function getArrDetalleSolicitud()
    {
        return $this->_arrDetalleSolicitud;
    }

    /**
     * @param mixed $_arrDetalleSolicitud
     *
     * @return self
     */
    public function setArrDetalleSolicitud()
    {
        $this->_arrDetalleSolicitud = DetalleSolicitud::obtenerPorIdSolicitud($this->_idSolicitud);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado()
    {
        $this->estado = Estado::obtenerPorId($this->_idEstado);

        return $this;
    }
}

?>