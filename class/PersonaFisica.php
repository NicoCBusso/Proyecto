<?php
require_once 'MySQL.php';
require_once 'Persona.php';

class PersonaFisica extends Persona{
	protected $_idPersonaFisica;
	protected $_nombre;
    protected $_apellido;
	protected $_fechaNacimiento;
    protected $_dni;
    protected $_sexo;
    protected $_estadoPersona;

    public function getPersonaFisca()
    {
        return $this->_idPersonaFisica;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre; 

        return $this;
    }

    public function getApellido()
    {
        return $this->_apellido;
    }

    public function setApellido($_apellido)
    {
        $this->_apellido = $_apellido; 

        return $this;
    }

    public function getFechaNacimiento()
    {
        return $this->_fechaNacimiento;
    }

    public function setFechaNacimiento($_fechaNacimiento)
    {
        $this->_fechaNacimiento = $_fechaNacimiento; 

        return $this;
    }

    public function getDni()
    {
        return $this->_dni;
    }

    public function setDni($_dni)
    {
        $this->_dni = $_dni; 

        return $this;
    }
    public function getSexo()
    {
        return $this->_sexo;
    }

    public function setSexo($_sexo)
    {
        $this->_sexo = $_sexo; 

        return $this;
    }

    public function getEstadoPersona()
    {
        return $this->_estadoPersona;
    }

    public function setEstadoPersona($_estadoPersona)
    {
        $this->_estadoPersona = $_estadoPersona; 

        return $this;
    }    
	public function __construct($nombre,$apellido) {
		$this->_nombre = $nombre;
        $this->_apellido = $apellido;
		$this->_estadoPersona = 1;
	}
  
    public function guardar() {
    	parent::guardar();

    	$sql = "INSERT INTO personafisica (id_persona_fisica,id_persona,nombre,apellido,fecha_nacimiento,sexo,dni,estado_persona) VALUES (NULL,$this->_idPersona,'$this->_nombre','$this->_apellido', '$this->_fechaNacimiento', '$this->_sexo','$this->_dni', '$this->_estadoPersona')" ;
    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idPersonaFisica = $idInsertado;
    }
    public function actualizar() {


        $sql = "UPDATE personafisica SET nombre = '$this->_nombre', apellido = '$this->_apellido', fecha_nacimiento = '$this->_fechaNacimiento', sexo = $this->_sexo, dni = '$this->_dni', estado_persona = $this->_estadoPersona WHERE id_persona_fisica = $this->_idPersonaFisica";
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

}

?>