<?php

require_once "MySQL.php";
require_once "Puesto.php";
require_once "TipoExcepcion.php";
require_once "ProductoFinal.php";

class Excepcion {

	private $_idExcepcion;
	private $_idTipoExcepcion;
	private $_fechaHora;
	private $_idConsumicionACambiar;
	private $_idConsumicionCambiada;
	private $_idPuesto;
	private $_idUsuario;

    public $consumicionACambiar;
    public $consumicionCambiada;
    public $tipoExcepcion;
    public $puesto;


	public function guardar(){
    	$sql = "INSERT INTO excepcion (id_excepcion,id_tipo_excepcion,fecha_hora,consumicion_a_cambiar,consumicion_cambiada,id_puesto,id_usuario)"
    			." VALUES (NULL,$this->_idTipoExcepcion,'$this->_fechaHora',$this->_idConsumicionACambiar,$this->_idConsumicionCambiada,$this->_idPuesto,$this->_idUsuario)";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idTipoExcepcion= $idInsertado;
        echo $sql;
    }

	public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM excepcion WHERE id_excepcion =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $excepcion = self::_generarExcepcion($registro);

        return $excepcion;
    }

	public static function obtenerTodos()
    {
        $sql= "SELECT * FROM excepcion";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);

        return $listado;
    }

	private function _generarListado($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $excepcion = self::_generarExcepcion($registro);
            $listado[] = $excepcion;
        }
        return $listado;
    }

	private function _generarExcepcion($registro){
		$excepcion = new Excepcion();
		$excepcion->_idExcepcion = $registro['id_excepcion'];
		$excepcion->_idTipoExcepcion = $registro['id_tipo_excepcion'];
		$excepcion->_fechaHora = $registro['fecha_hora'];
		$excepcion->_idConsumicionACambiar = $registro['consumicion_a_cambiar'];
        $excepcion->setConsumicionACambiar();
		$excepcion->_idConsumicionCambiada = $registro['consumicion_cambiada'];
        $excepcion->setConsumicionCambiada();
		$excepcion->_idPuesto = $registro['id_puesto'];
		$excepcion->_idUsuario = $registro['id_usuario'];
        $excepcion->setTipoExcepcion();
        $excepcion->setPuesto();

		return $excepcion;
	}

    /**
     * @return mixed
     */
    public function getIdExcepcion()
    {
        return $this->_idExcepcion;
    }

    /**
     * @param mixed $_idExcepcion
     *
     * @return self
     */
    public function setIdExcepcion($_idExcepcion)
    {
        $this->_idExcepcion = $_idExcepcion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaHora()
    {
        return $this->_fechaHora;
    }

    /**
     * @param mixed $_fechaHora
     *
     * @return self
     */
    public function setFechaHora($_fechaHora)
    {
        $this->_fechaHora = $_fechaHora;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdConsumicionACambiar()
    {
        return $this->_idConsumicionACambiar;
    }

    /**
     * @param mixed $_consumicionACambiar
     *
     * @return self
     */
    public function setIdConsumicionACambiar($_idConsumicionACambiar)
    {
        $this->_idConsumicionACambiar = $_idConsumicionACambiar;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdConsumicionCambiada()
    {
        return $this->_idConsumicionCambiada;
    }

    /**
     * @param mixed $_consumicionCambiada
     *
     * @return self
     */
    public function setIdConsumicionCambiada($_idConsumicionCambiada)
    {
        $this->_idConsumicionCambiada = $_idConsumicionCambiada;

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
    public function getIdTipoExcepcion()
    {
        return $this->_idTipoExcepcion;
    }

    /**
     * @param mixed $_idTipoExcepcion
     *
     * @return self
     */
    public function setIdTipoExcepcion($_idTipoExcepcion)
    {
        $this->_idTipoExcepcion = $_idTipoExcepcion;

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
    public function setPuesto() {
        $this->puesto = Puesto::obtenerPorId($this->_idPuesto);

        return $this;
    }
    public function setTipoExcepcion() {
        $this->tipoExcepcion = TipoExcepcion::obtenerPorId($this->_idTipoExcepcion);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConsumicionACambiar()
    {
        return $this->consumicionACambiar;
    }

    /**
     * @param mixed $consumicionACambiar
     *
     * @return self
     */
    public function setConsumicionACambiar()
    {
        $this->consumicionACambiar = ProductoFinal::obtenerPorId($this->_idConsumicionACambiar);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConsumicionCambiada()
    {
        return $this->consumicionCambiada;
    }

    /**
     * @param mixed $consumicionCambiada
     *
     * @return self
     */
    public function setConsumicionCambiada()
    {
        $this->consumicionCambiada = ProductoFinal::obtenerPorId($this->_idConsumicionCambiada);

        return $this;
    }
}

?>