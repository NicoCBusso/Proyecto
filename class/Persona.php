<?php

require_once 'MySQL.php';

class Persona{
	protected $_idPersona;
	protected $_arrDireccion;
	protected $_arrContacto;

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * @param mixed $_idPersona
     *
     * @return self
     */

    /**
     * @return mixed
     */
    public function getArrDireccion()
    {
        return $this->_arrDireccion;
    }

    /**
     * @param mixed $_arrDireccion
     *
     * @return self
     */
    public function setArrDireccion($_arrDireccion)
    {
        $this->_arrDireccion = $_arrDireccion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArrContacto()
    {
        return $this->_arrContacto;
    }

    /**
     * @param mixed $_arrContacto
     *
     * @return self
     */
    public function setArrContacto($_arrContacto)
    {
        $this->_arrContacto = $_arrContacto;

        return $this;
    }
    public function guardar(){
    	$sql = "INSERT INTO persona (id_persona) VALUES (NULL)";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idPersona = $idInsertado;
        echo "insertado";
    }

}

?>