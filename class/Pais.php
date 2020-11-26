<?php
require_once 'MySQL.php';
class Pais {
	private $_idPais;
	private $_descripcion;

	public function __construct($descripcion) {
		$this->_descripcion = $descripcion;
	}
    /**
     * @return mixed
     */
    public function getIdPais()
    {
        return $this->_idPais;
    }
    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->_descripcion;
    }
    /**
     * @param mixed $_descripcion
     *
     * @return self
     */
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }
    public function guardar(){
    	$sql = "INSERT INTO pais (id_pais,nombre) VALUES (NULL,'$this->_descripcion');";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idPais = $idInsertado;
        echo "insertado";
    } 
    public function actualizar() {
        $sql = "UPDATE pais SET nombre = '$this->_descripcion' WHERE id_pais = $this->_idPais";
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

    public static function obtenerTodos()
    {
        $sql= "SELECT id_pais,nombre FROM pais";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoPais($datos);

        return $listado;
    }
    public static function consultarDescripcion($descripcion){
        $sql = "SELECT nombre FROM pais WHERE nombre = ". $descripcion;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($datos->num_rows > 0) {
           $registro = $datos->fetch_assoc();
           $pais = self::_generarPais($registro);
           return $pais; 
        } else {
            return;
        }
    }
    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM pais WHERE id_pais =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $pais = self::_generarPais($registro);

        return $pais;
    }
    private function _generarPais($registro){

        $pais = new Pais ($registro['nombre']);
        $pais->_idPais = $registro['id_pais'];
        return $pais;
    }
    public function _generarListadoPais($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $pais = self::_generarPais($registro);
            $listado[] = $pais;
            }
        return $listado;
    }

    public static function obtenerPorIdProvincia($id){
        $sql = "SELECT pais.nombre, pais.id_pais FROM provincia INNER JOIN pais ON provincia.id_pais = pais.id_pais WHERE provincia.id_provincia =" . $id;
        //var_dump($sql);
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $pais = self::_generarPais($registro);

        return $pais;
    }
}


?>