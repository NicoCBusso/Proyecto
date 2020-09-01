<?php
require_once "MySQL.php";

class Categoria{
	private $_idCategoria;
	private $_nombre;

	public function __construct($nombre){
		$this->_nombre = $nombre;
	}



    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->_idCategoria;
    }

    /**
     * @param mixed $_idCategoria
     *
     * @return self
     */


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

    /**
     * @return mixed
     */

    public function guardar(){
        $sql = "INSERT INTO categoria (id_categoria,nombre) VALUES (NULL,'$this->_nombre')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idCategoria= $idInsertado;
        var_dump($sql);
    }    
    public function actualizar() {
        $sql = "UPDATE categoria SET nombre = '$this->_nombre' WHERE id_categoria = $this->_idCategoria";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    private function _generarCategoria($registro){
        $categoria = new Categoria($registro['nombre']);
        $categoria->_idCategoria = $registro['id_categoria'];
        return $categoria;
    }

    public static function obtenerPorId($id){
        $sql = "SELECT * FROM categoria WHERE id_categoria =". $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $categoria = self::_generarCategoria($registro);
        return $categoria;
    }

    public static function obtenerTodos()
    {
        $sql= "SELECT id_categoria,nombre FROM categoria";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoCategorias($datos);

        return $listado;
    }

    private function _generarListadoCategorias($datos){
        $listado = array();
            while ($registro = $datos->fetch_assoc()){
                $categoria = new Categoria($registro['nombre']);
                $categoria->_idCategoria = $registro['id_categoria'];
                $listado[] = $categoria;
            }
            return $listado;
    }
        public static function obtenerPorIdSubCategoria($idCategoria) {
        
        $sql = "SELECT categoria.nombre, categoria.id_categoria FROM subcategoria 
        INNER JOIN categoria ON subcategoria.id_categoria = categoria.id_categoria
        WHERE subcategoria.id_categoria = " . $idCategoria;
        //var_dump($sql);
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $categoria = new Categoria($registro['nombre']);   
        $categoria->_idCategoria = $registro['id_categoria'];

        return $categoria;

    }
}

?>