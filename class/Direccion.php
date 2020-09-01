<?php
require_once 'MySQL.php';
require_once 'Persona.php';
require_once 'Localidad.php';

class Direccion {

	private $_idDireccion;
	private $_idLocalidad;
	private $_calle;
    private $_numero;
    private $_idPersona;

    public $localidad;

    public function guardar(){
    	$sql = "INSERT INTO direccion (id_direccion,id_persona,id_localidad,calle,numero) VALUES (NULL,$this->_idPersona,$this->_idLocalidad,'$this->_calle',$this->_numero)";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idDireccion= $idInsertado;
        var_dump($sql);
        echo "insertado";
    }
    public function actualizar() {
        $sql = "UPDATE direccion SET calle = '$this->_calle', numero = $this->_numero, id_localidad = $this->_idLocalidad WHERE id_direccion = $this->_idDireccion";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        var_dump($sql);
    }
    public static function obtenerPorIdPersona($idPersona)
    {
        $sql = "SELECT * FROM direccion WHERE id_persona = " . $idPersona;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $direccion = null;
        if($datos->num_rows > 0){
            $direccion = new Direccion();
            $direccion->_idDireccion = $registro['id_direccion'];
            $direccion->_calle = $registro['calle'];
            $direccion->_numero = $registro['numero'];
            $direccion->_idPersona = $registro['id_persona'];
            $direccion->_idLocalidad = $registro['id_localidad'];
            $direccion->setLocalidad();
        }

        return $direccion;
        
    }


    /**
     * @return mixed
     */
    public function getIdDireccion()
    {
        return $this->_idDireccion;
    }

    /**
     * @param mixed $_idDireccion
     *
     * @return self
     */

    /**
     * @return mixed
     */
    public function getIdLocalidad()
    {
        return $this->_idLocalidad;
    }

    /**
     * @param mixed $_idLocalidad
     *
     * @return self
     */

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
    public function __toString() {
        return $this->_calle . " " . $this->_numero;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->_calle;
    }

    /**
     * @param mixed $_calle
     *
     * @return self
     */
    public function setCalle($_calle)
    {
        $this->_calle = $_calle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->_numero;
    }

    /**
     * @param mixed $_numero
     *
     * @return self
     */
    public function setNumero($_numero)
    {
        $this->_numero = $_numero;

        return $this;
    }
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * @param mixed $_idPersona
     *
     * @return self
     */
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }


    /**
     * @param mixed $_idLocalidad
     *
     * @return self
     */


    /**
     * @param mixed $_idlocalidad
     *
     * @return self
     */
    public function setIdlocalidad($_idLocalidad)
    {
        $this->_idLocalidad = $_idLocalidad;

        return $this;
    }

    public function setLocalidad(){
        $this->localidad = Localidad::obtenerPorIdDireccion($this->_idDireccion);
    }
}

?>