<?php
require_once 'PersonaFisica.php';
require_once 'MySQL.php';
//require_once 'Perfil.php';

class Usuario extends PersonaFisica {
	protected $_idUsuario;
	protected $_username;
	protected $_password;
	protected $_idPerfil;
	public function __construct($username,$password) {
			$this->_username = $username;
			$this->_password = $password;
		}	
    public function guardar(){
    	parent::guardar();
    	$sql = "INSERT INTO usuario (id_usuario,username,password,id_perfil,id_persona_fisica) VALUES (NULL,'$this->$_username','$this->$_password',$this->$_idPerfil,$this->idPersonaFisica)";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idUsuario= $idInsertado;
        echo "insertado";
    }	
    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE usuario SET username = '$this->_username', password = '$this->_password' WHERE id_usuario = $this->_idUsuario";
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

}

?>