<?php
require_once 'MySQL.php';
require_once 'Modulo.php';
class Perfil{
	private $_idPerfil;
	private $_arrModulos;
	private $_descripcion;


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

    /**
     * @return mixed
     */
    public function getArrModulos()
    {
        return $this->_arrModulos;
    }

    /**
     * @param mixed $_arrModulos
     *
     * @return self
     */
    public function setArrModulos($_arrModulos)
    {
        $this->_arrModulos = $_arrModulos;

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
     * @param mixed $descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->_descripcion = $descripcion;

        return $this;
    }
	public function __construct($descripcion) {
			$this->_descripcion = $descripcion;
	}
    public function guardar(){
    	$sql = "INSERT INTO perfil (id_perfil,nombre) VALUES (NULL,'$this->_descripcion')";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idPerfil= $idInsertado;

    }
    public function actualizar() {

        $sql = "UPDATE perfil SET nombre = '$this->_descripcion' WHERE id_perfil = $this->_idPerfil";

        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }
    public static function obtenerTodos()
    {
        $sql= "SELECT id_perfil,nombre FROM perfil";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoPerfil($datos);

        return $listado;
    }
        public static function obtenerPorIdUsuario($idUsuario) {
        
        $sql = "SELECT * FROM usuario 
        INNER JOIN perfil ON usuario.id_perfil = perfil.id_perfil
        WHERE id_usuario = " . $idUsuario;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $perfil = self::_generarPerfil($registro);

        return $perfil;

    }
    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM perfil WHERE id_perfil =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $perfil = self::_generarPerfil($registro);
        $perfil->_arrModulos = Modulo::obtenerModulosPorIdPerfil($perfil->_idPerfil);
        return $perfil;
    }

    public function _generarPerfil($registro){
        $perfil = new Perfil($registro['nombre']);
        $perfil->_descripcion = $registro['nombre'];
        $perfil->_idPerfil = $registro['id_perfil'];
        return $perfil;
    }

    public function _generarListadoPerfil($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $perfil = self::_generarPerfil($registro);
            $listado[] = $perfil;
            }
        return $listado;
    }
    public function tieneModulo($idModulo){
        $sql = "SELECT * FROM perfil_modulo WHERE id_modulo = $idModulo AND id_perfil = $this->_idPerfil";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        return $result->num_rows > 0;
    }

    public function eliminarModulos() {
        $sql = "DELETE FROM perfil_modulo WHERE id_perfil = $this->_idPerfil";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }    
}
?>