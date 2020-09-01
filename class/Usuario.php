<?php
require_once 'PersonaFisica.php';
require_once 'MySQL.php';
require_once 'Perfil.php';

class Usuario extends PersonaFisica {
	protected $_idUsuario;
	protected $_username;
	protected $_password;
	protected $_idPerfil;
    protected $_fechaUltimoLogin;
    protected $_estaLogueado;

    public $perfil;

	public function __construct($username,$password) {
			$this->_username = $username;
			$this->_password = $password;
		}	
    public function guardar(){
        parent::guardar();
    	$sql = "INSERT INTO usuario (id_usuario,username,password,id_perfil,id_persona_fisica) VALUES (NULL,'$this->_username','$this->_password',$this->_idPerfil,$this->_idPersonaFisica)";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idUsuario= $idInsertado;
        var_dump($sql);
        echo "insertado";
    }	
    public function actualizar() {

        $sql = "UPDATE usuario SET username = '$this->_username', password = '$this->_password', id_perfil = $this->_idPerfil WHERE id_usuario = $this->_idUsuario";
        var_dump($sql);
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }
    /*public static function obtenerNoUsuarios()
    {
        $sql= "SELECT personafisica.id_persona_fisica,personafisica.nombre,personafisica.apellido,personafisica.dni,personafisica.sexo,personafisica.fecha_nacimiento FROM personafisica LEFT JOIN usuario ON personafisica.id_persona_fisica = usuario.id_persona_fisica WHERE usuario.`id_persona_fisica` IS NULL";
        
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoPersonaFisica($datos);

        return $listado;
    }*/
    public static function obtenerTodos()
    {
        $sql= "SELECT * FROM personafisica INNER JOIN usuario ON personafisica.id_persona_fisica = usuario.id_persona_fisica";
        ;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoUsuario($datos);

        return $listado;
    }

    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM usuario INNER JOIN personafisica ON personafisica.id_persona_fisica = usuario.id_persona_fisica INNER JOIN persona ON personafisica.id_persona = persona.id_persona WHERE id_usuario =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $usuario = self::_generarUsuario($registro);

        return $usuario;
    }
    public function _generarUsuario($registro)
    {
        $usuario = new Usuario($registro['nombre'], $registro['apellido']);
        $usuario->_idPersona = $registro['id_persona'];
        $usuario->_idPersonaFisica = $registro['id_persona_fisica'];
        $usuario->_idUsuario = $registro['id_usuario'];
        $usuario->_nombre = $registro['nombre'];
        $usuario->_apellido = $registro['apellido'];
        $usuario->_fechaNacimiento = $registro['fecha_nacimiento'];
        $usuario->_dni = $registro['dni'];
        $usuario->_sexo = $registro['sexo'];
        $usuario->_username = $registro['username'];
        $usuario->_idPerfil = $registro['id_perfil'];
        $usuario->_estadoPersona = $registro['estado_persona'];
        //$usuario->_fechaUltimoLogin = $registro['fecha_ultimo_login'];
        $usuario->_estaLogueado = true;
        $usuario->perfil = Perfil::obtenerPorId($usuario->_idPerfil);        
        $usuario->setDireccion();

        return $usuario;
    }
    public function _generarListadoUsuario($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $usuario = self::_generarUsuario($registro);
            $listado[] = $usuario;
            }
        return $listado;
    }
    public static function login($username, $password) {
        $sql = "SELECT * FROM usuario "
             . "INNER JOIN personafisica on personafisica.id_persona_fisica = usuario.id_persona_fisica "
             . "WHERE username = '$username' "
             . "AND password = '$password' "
             . "AND personafisica.estado_persona = 1";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($result->num_rows > 0) {
            $registro = $result->fetch_assoc();
            $usuario = self::_generarUsuario($registro);
        } else {
            $usuario = new Usuario('', '');
            $usuario->_estaLogueado = false;
        }

        return $usuario;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }

    /**
     * @param mixed $_idUsuario
     *
     * @return self
     */

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param mixed $_username
     *
     * @return self
     */
    public function setUsername($_username)
    {
        $this->_username = $_username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $_password
     *
     * @return self
     */
    public function setPassword($_password)
    {
        $this->_password = $_password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }

    /**
     * @param mixed $_idPerfil
     *
     * @return self
     */
    public function setIdPerfil($_idPerfil)
    {
        $this->_idPerfil = $_idPerfil;

        return $this;
    }
    public function estaLogueado() {
        return $this->_estaLogueado;
    }
    public function __toString() {
        return $this->_username;
    }  
}

?>