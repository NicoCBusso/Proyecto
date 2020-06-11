<?php

require_once 'Provincia.php';

class Localidad {
	private $_idLocalidad;
	private $_descripcion;
	
	public function __construct($descripcion) {
			$this->_descripcion = $descripcion;
            $this->_idProvincia = 2;
		}	
    public function guardar(){
    	$sql = "INSERT INTO localidad (id_localidad,nombre,id_provincia) VALUES (NULL,'$this->_descripcion','$this->_idProvincia')";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idLocalidad= $idInsertado;
        echo "insertado";
    }
    public function actualizar() {
        $sql = "UPDATE localidad SET nombre = '$this->_descripcion' WHERE id_localidad = $this->_idLocalidad";
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

}
?>