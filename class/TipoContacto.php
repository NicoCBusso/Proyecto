<?php

require_once 'MySQL.php';

class TipoContacto {

	private $_idTipoContacto;
	private $_descripcion;

	public function __construct($descripcion) {
		$this->_descripcion = $descripcion;
	}

    /**
     * @return mixed
     */
    public function getIdTipoContacto()
    {
        return $this->_idTipoContacto;
    }

    /**
     * @param mixed $_idTipoContacto
     *
     * @return self
     */
    public function setIdTipoContacto($_idTipoContacto)
    {
        $this->_idTipoContacto = $_idTipoContacto;

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

    public function guardar(){
        $sql = "INSERT INTO tipocontacto (id_tipo_contacto,descripcion) VALUES (NULL,'$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idTipoContacto= $idInsertado;
        echo "insertado";
    }
    public function actualizar() {

        $sql = "UPDATE tipocontacto SET descripcion = '$this->_descripcion' WHERE id_tipo_contacto = $this->_idTipoContacto";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public static function obtenerTodos() {
    	$sql = "SELECT * FROM tipocontacto";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListado($datos);
    	return $listado;
    }
    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM tipocontacto WHERE id_tipo_contacto =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $tipoContacto = TipoContacto::_generarTipoContacto($registro);

        return $tipoContacto;
    }

    private function _generarTipoContacto($registro){
        $tipoContacto = new TipoContacto($registro['descripcion']);
        $tipoContacto->_idTipoContacto = $registro['id_tipo_contacto'];
        return $tipoContacto;
    }
    private function _generarListado($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$tipoContacto = TipoContacto::_generarTipoContacto($registro);
			$listado[] = $tipoContacto;
		}
		return $listado;
    }

    public function __toString() {
    	return $this->_descripcion;
    }

}



?>