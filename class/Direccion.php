<?php
require_once 'Persona.php';
require_once 'Localidad.php';

class Domicilio {

	private $_idDireccion;
	private $_idLocalidad;
	private $_descripcion;

	public function __construct($descripcion) {
			$this->_descripcion = $descripcion;
            $this->_idPersona = 1;
            $this->_idLocalidad = 2;
		}	
    public function guardar(){
    	$sql = "INSERT INTO direccion (id_direccion,id_persona,id_localidad,descripcion) VALUES (NULL,$this->_idPersona,$this->_idLocalidad,'$this->_descripcion')";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idDireccion= $idInsertado;
        echo "insertado";
    }
        public function actualizar() {
        $sql = "UPDATE direccion SET descripcion = '$this->_descripcion' WHERE id_direccion = $this->_idDireccion";
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }


}

?>