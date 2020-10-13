<?php 
require_once 'MySQL.php';

class Estado {

	private $_idEstado;
	private $_descripcion;


	public function __construct($descripcion){
		$this->_descripcion = $descripcion;
	}

	public static function obtenerPorId($id){
    	$sql = "SELECT * FROM estado WHERE id_estado = ". $id;

    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
        $registro = $datos->fetch_assoc();

        $estado = self::_generarEstado($registro);
        return $estado;
    }

    private function _generarEstado($registro){
    	$estado = new Estado($registro['descripcion']);
    	$estado->_idEstado = $registro['id_estado'];
    	return $estado;
    }

    /**
     * @return mixed
     */
    public function getIdEstado()
    {
        return $this->_idEstado;
    }

    /**
     * @param mixed $_idEstado
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
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * @param mixed $descripcion
     *
     * @return self
     */
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }
}

?>