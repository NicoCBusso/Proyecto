<?php
require_once 'MySQL.php';

class Envase{
	private $_idEnvase;
	private $_nombre;

    public function __construct($nombre){
        $this->_nombre = $nombre;
    }

    public function guardar(){
        $sql = "INSERT INTO envase (id_envase,nombre) VALUES (NULL,'$this->_nombre')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idEnvase= $idInsertado;
        echo "insertado";
    }
    public function actualizar() {

        $sql = "UPDATE envase SET nombre = '$this->_nombre' WHERE id_envase = $this->_idEnvase";
        var_dump($sql);
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    public static function obtenerTodos()
    {
        $sql= "SELECT id_envase,nombre FROM envase";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoEnvase($datos);

        return $listado;
    }
    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM envase WHERE id_envase =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $envase = self::_generarEnvase($registro);
        return $envase;
    }
    private function _generarEnvase($registro){
        $envase = new Envase($registro['nombre']);
        $envase->_idEnvase = $registro['id_envase'];
        return $envase;
    }
    public function _generarListadoEnvase($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $envase = self::_generarEnvase($registro);
            /*$perfil = new Perfil($registro['nombre']);
            $perfil->_descripcion = $registro['nombre'];
            $perfil->_idPerfil = $registro['id_perfil'];*/
            $listado[] = $envase;
            }
        return $listado;
    }
    public static function obtenerPorIdProducto($idProducto) {
        
        $sql = "SELECT * FROM producto 
        INNER JOIN envase ON producto.id_envase = envase.id_envase
        WHERE id_producto = " . $idProducto;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $envase = new Envase($registro['nombre']);   
        $envase->_idEnvase = $registro['id_envase'];

        return $envase;

    }

    /**
     * @return mixed
     */
    public function getIdEnvase()
    {
        return $this->_idEnvase;
    }

    /**
     * @param mixed $_idEnvase
     *
     * @return self
     */
    public function setIdEnvase($_idEnvase)
    {
        $this->_idEnvase = $_idEnvase;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->_nombre;
    }

    /**
     * @param mixed $_nombre
     *
     * @return self
     */
    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }
}


?>