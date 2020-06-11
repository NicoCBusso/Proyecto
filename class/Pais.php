<?php

class Pais {
	private $_idPais;
	private $_arrProvincia;
	private $_descripcion;

	public function __construct($descripcion) {
		$this->_descripcion = $descripcion;
	}
    /**
     * @return mixed
     */
    public function getIdPais()
    {
        return $this->_idPais;
    }

    /**
     * @param mixed $_idPais
     *
     * @return self
     */

    /**
     * @return mixed
     */
    public function getArrProvincia()
    {
        return $this->_arrProvincia;
    }

    /**
     * @param mixed $_arrProvincia
     *
     * @return self
     */
    public function setArrProvincia($_arrProvincia)
    {
        $this->_arrProvincia = $_arrProvincia;

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
    	$sql = "INSERT INTO pais (id_pais,nombre) VALUES (NULL,'$this->_descripcion');";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idPais = $idInsertado;
        echo "insertado";
    } 
    public function actualizar() {
        $sql = "UPDATE pais SET nombre = '$this->_descripcion' WHERE id_pais = $this->_idPais";
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

}


?>