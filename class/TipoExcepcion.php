<?php

class TipoExcepcion {

	private $_idTipoExcepcion;
	private $_descripcion;



	public function guardar(){
    	$sql = "INSERT INTO tipoexcepcion (id_tipo_excepcion,descripcion) VALUES (NULL,'$this->_descripcion)";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idTipoExcepcion= $idInsertado;
    }

    public function actualizar() {
        $sql = "UPDATE tipoexcepcion SET descripcion = '$this->_descripcion' WHERE id_tipo_excepcion = $this->_idTipoExcepcion";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

	public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM tipoexcepcion WHERE id_tipo_excepcion =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $tipoExcepcion = self::_generarTipoExcepcion($registro);

        return $tipoExcepcion;
    }

	public static function obtenerTodos()
    {
        $sql= "SELECT * FROM tipoexcepcion";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);

        return $listado;
    }

	private function _generarListado($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $tipoExcepcion = self::_generarTipoExcepcion($registro);
            $listado[] = $tipoExcepcion;
        }
        return $listado;
    }

	private function _generarTipoExcepcion($registro){
		$tipoExcepcion = new TipoExcepcion();
		$tipoExcepcion->_idTipoExcepcion = $registro['id_tipo_excepcion'];
		$tipoExcepcion->_descripcion = $registro['descripcion'];
		return $tipoExcepcion;
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
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * @param mixed $_descripcion
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