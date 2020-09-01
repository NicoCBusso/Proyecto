<?php
require_once "Categoria.php";

class SubCategoria{
	private $_idSubCategoria;
	private $_nombre;
	private $_idCategoria;

    public $categoria;

	public function __construct ($nombre){
		$this->_nombre = $nombre;
	}


    /**
     * @return mixed
     */
    public function getIdSubCategoria()
    {
        return $this->_idSubCategoria;
    }

    /**
     * @param mixed $_idSubCategoria
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

    public function guardar(){
    	$sql = "INSERT INTO subcategoria (id_subcategoria,nombre,id_categoria) VALUES (NULL,'$this->_nombre',$this->_idCategoria)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idSubCategoria= $idInsertado;
        var_dump($sql);
    }
    public function actualizar() {
        $sql = "UPDATE subcategoria SET nombre = '$this->_nombre', id_categoria = $this->_idCategoria WHERE id_subcategoria = $this->_idSubCategoria";
        var_dump($sql);
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }
    private function _generarSubCategoria($registro){
        $subcategoria = new SubCategoria($registro['nombre']);
        $subcategoria->_idSubCategoria = $registro['id_subcategoria'];
        $subcategoria->_idCategoria = $registro['id_categoria'];
        $subcategoria->setCategoria();        
        return $subcategoria;
    }
    
    public static function obtenerPorId($id){
        $sql = "SELECT * FROM subcategoria WHERE id_subcategoria =". $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $subcategoria = self::_generarSubCategoria($registro);
        return $subcategoria;
    }
    public static function obtenerPorIdCategoria($id){
    	$sql = "SELECT subcategoria.nombre,subcategoria.id_subcategoria,subcategoria.id_categoria FROM subcategoria INNER JOIN categoria ON categoria.id_categoria = subcategoria.id_categoria WHERE subcategoria.id_categoria =". $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoSubCategorias($datos);
        return $listado;
    }        
    public static function obtenerTodos()
    {
        $sql= "SELECT id_subcategoria,nombre,id_categoria FROM subcategoria";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoSubCategorias($datos);

        return $listado;
    }
    private function _generarListadoSubCategorias($datos){
        $listado = array();
            while ($registro = $datos->fetch_assoc()){
                $subcategoria = new SubCategoria($registro['nombre']);
                $subcategoria->_idSubCategoria = $registro['id_subcategoria'];
                $subcategoria->_idCategoria = $registro['id_categoria'];
                $subcategoria->setCategoria();
                $listado[] = $subcategoria;
            }
            return $listado;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->_idCategoria;
    }

    /**
     * @param mixed $_categoria
     *
     * @return self
     */
    public function setIdCategoria($_idCategoria)
    {
        $this->_idCategoria = $_idCategoria;

        return $this;
    }
    public function setCategoria(){
        $this->categoria = Categoria::obtenerPorIdSubCategoria($this->_idCategoria);
    }
    public static function obtenerPorIdProducto($idProducto) {
        
        $sql = "SELECT * FROM producto 
        INNER JOIN subcategoria ON producto.id_subcategoria = subcategoria.id_subcategoria
        WHERE id_producto = " . $idProducto;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $subcategoria = self::_generarSubCategoria($registro);

        return $subcategoria;

    }
}

?>