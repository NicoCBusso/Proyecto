<?php
require_once "MySQL.php";

class Modulo {

	private $_idModulo;
	private $_descripcion;
	private $_directorio;
	
	public function __construct($descripcion, $directorio) {
		$this->_descripcion = $descripcion;
		$this->_directorio = $directorio;
	}	


    /**
     * @return mixed
     */
    public function getIdModulo()
    {
        return $this->_idModulo;
    }

    /**
     * @param mixed $_idModulo
     *
     * @return self
     */
    public function setIdModulo($_idModulo)
    {
        $this->_idModulo = $_idModulo;

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
     * @param mixed $_descripcion
     *
     * @return self
     */
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDirectorio()
    {
        return $this->_directorio;
    }

    /**
     * @param mixed $_directorio
     *
     * @return self
     */
    public function setDirectorio($_directorio)
    {
        $this->_directorio = $_directorio;

        return $this;
    }

    public function guardar(){
        $sql = "INSERT INTO modulo (id_modulo,nombre,directorio) VALUES (NULL,'$this->_descripcion','$this->_directorio')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idModulo= $idInsertado;
        echo "insertado";
    }
    public function actualizar() {

        $sql = "UPDATE modulo SET nombre = '$this->_descripcion', directorio = '$this->_directorio' WHERE id_modulo = $this->_idModulo";
        var_dump($sql);
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM modulo WHERE id_modulo =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $modulo = self::_generarModulo($registro);
        
        return $modulo;
    }
    private function _generarModulo($registro){
        $modulo = new Modulo($registro['nombre'], $registro['directorio']);
        $modulo->_idModulo = $registro['id_modulo'];
        return $modulo;
    }
    public static function obtenerTodos(){
        $sql = "SELECT * FROM modulo";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoModulos($datos);

        return $listado;
    }

    public static function obtenerModulosPorIdPerfil($idPerfil){
    	$sql = "SELECT modulo.id_modulo, modulo.nombre,modulo.directorio FROM modulo INNER JOIN perfil_modulo on perfil_modulo.id_modulo = modulo.id_modulo INNER JOIN perfil on perfil.id_perfil = perfil_modulo.id_perfil WHERE perfil.id_perfil = " . $idPerfil;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoModulos($datos);
        return $listado;

    }
    private function _generarListadoModulos($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$modulo = self::_generarModulo($registro);
			$listado[] = $modulo;
		}
		return $listado;
    }
    public function __toString() {
    	return $this->_descripcion;
    }

}


?>