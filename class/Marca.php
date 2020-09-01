<?php

require_once 'MySQL.php';

class Marca{
	private $_idMarca;
	private $_nombre;
	
    public function __construct($nombre){
        $this->_nombre = $nombre;    
    }
    /**
     * @return mixed
     */
    public function getIdMarca()
    {
        return $this->_idMarca;
    }

    /**
     * @param mixed $_idMarca
     *
     * @return self
     */
    public function setIdMarca($_idMarca)
    {
        $this->_idMarca = $_idMarca;

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
    public function guardar(){
        $sql = "INSERT INTO marca (id_marca,nombre) VALUES (NULL,'$this->_nombre')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idMarca= $idInsertado;
        echo "insertado";
    }
    public function actualizar() {

        $sql = "UPDATE marca SET nombre = '$this->_nombre' WHERE id_marca = $this->_idMarca";
        var_dump($sql);
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    public static function obtenerTodos()
    {
        $sql= "SELECT id_marca,nombre FROM marca";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoMarca($datos);

        return $listado;
    }        
    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM marca WHERE id_marca =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $marca = self::_generarMarca($registro);
        return $marca;
    }
    private function _generarMarca($registro){
        $marca = new Marca($registro['nombre']);
        $marca->_idMarca = $registro['id_marca'];
        return $marca;
    }
    public function _generarListadoMarca($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $marca = self::_generarMarca($registro);
            /*$perfil = new Perfil($registro['nombre']);
            $perfil->_descripcion = $registro['nombre'];
            $perfil->_idPerfil = $registro['id_perfil'];*/
            $listado[] = $marca;
            }
        return $listado;
    }
    public static function obtenerPorIdProducto($idProducto) {
        
        $sql = "SELECT * FROM producto 
        INNER JOIN marca ON producto.id_marca = marca.id_marca
        WHERE id_producto = " . $idProducto;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $marca = new Marca($registro['nombre']);   
        $marca->_idMarca = $registro['id_marca'];

        return $marca;

    }
}
?>