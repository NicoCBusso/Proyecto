<?php 

require_once 'MySQL.php';

class Cargo{
	private $_idCargo;
	private $_nombre;

	public function __construct($nombre){
		$this->_nombre = $nombre;
	}

	public function guardar(){
    	$sql = "INSERT INTO cargo (id_cargo,nombre) VALUES (NULL,'$this->_nombre')";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idCargo= $idInsertado;
        echo "insertado";
    }
    public function actualizar() {

        $sql = "UPDATE cargo SET nombre = '$this->_nombre' WHERE id_cargo = $this->_idCargo";
        //var_dump($sql);
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    private function _generarCargo($registro){
    	$cargo = new Cargo($registro['nombre']);
    	$cargo->_idCargo = $registro['id_cargo'];
    	return $cargo;
    }

    public function _generarListadoPerfil($datos){
    	$listado = array();
    	while ($registro = $datos->fetch_assoc()) {
    		$cargo = self::_generarCargo($registro);
    		$listado[] = $cargo;
    	}
    	return $listado;
    }
    public static function obtenerTodos()
    {
        $sql= "SELECT id_cargo,nombre FROM cargo";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoPerfil($datos);

        return $listado;
    }
    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM cargo WHERE id_cargo =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $cargo = new Cargo($registro['nombre']);
        $cargo->_idCargo = $registro['id_cargo'];
        return $cargo;
    }


    /**
     * @return mixed
     */
    public function getIdCargo()
    {
        return $this->_idCargo;
    }

    /**
     * @param mixed $_idCargo
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

    public static function obtenerPorIdEmpleado($id){
        $sql = "SELECT cargo.id_cargo,cargo.nombre FROM empleado INNER JOIN cargo ON empleado.id_cargo = cargo.id_cargo WHERE id_empleado =". $id;
        //var_dump($sql);
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $cargo = self::_generarCargo($registro);
        return $cargo;
    }    
}

?>