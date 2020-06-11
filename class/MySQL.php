<?php


class MySQL {

	private $_mysqli;

	public function __construct() {
		$this->_mysqli = new mysqli('localhost','root','','proyecto');
	}

	public function insertar($sql) {
		$this->_mysqli->query($sql);
		return $this->_mysqli->insert_id;
	}

	public function consultar($sql) {
		$datos = $this->_mysqli->query($sql);
		return $datos;
	}

	public function desconectar() {
		$this->_mysqli->close();
	}
	public function actualizar($sql){
		$this->_mysqli->query($sql);
	}

}


?>