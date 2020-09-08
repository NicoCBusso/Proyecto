<?php

require_once 'Provincia.php';

class Localidad {
	private $_idLocalidad;
    private $_idProvincia;
	private $_descripcion;

    public $provincia;
	
	public function __construct($descripcion) {
			$this->_descripcion = $descripcion;
		}	
    public function guardar(){
    	$sql = "INSERT INTO localidad (id_localidad,nombre,id_provincia) VALUES (NULL,'$this->_descripcion','$this->_idProvincia')";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idLocalidad= $idInsertado;
        echo "insertado";
    }
    public function actualizar() {
        $sql = "UPDATE localidad SET nombre = '$this->_descripcion', id_provincia = $this->_idProvincia WHERE id_localidad = $this->_idLocalidad";
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }
   public static function obtenerTodos()
    {
        $sql= "SELECT id_localidad,nombre,id_provincia FROM localidad";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoLocalidad($datos);

        return $listado;
    }

    public static function obtenerPorIdDireccion($id){
        $sql = "SELECT localidad.id_localidad,localidad.id_provincia,localidad.nombre FROM direccion INNER JOIN localidad ON direccion.id_localidad = localidad.id_localidad WHERE id_direccion =". $id;
        //var_dump($sql);
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $localidad = self::_generarLocalidad($registro);

        return $localidad;
    }

    public static function obtenerPorIdProvincia($id){
        $sql = "SELECT localidad.id_localidad,localidad.nombre,localidad.id_provincia FROM localidad INNER JOIN provincia ON provincia.id_provincia = localidad.id_provincia WHERE localidad.id_provincia =". $id ;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoLocalidad($datos);
        return $listado;
    } 

    private function _generarLocalidad($registro){
        $localidad = new Localidad ($registro['nombre']);
        $localidad->_idLocalidad = $registro['id_localidad'];
        $localidad->_idProvincia = $registro['id_provincia'];
        $localidad->setProvincia();
        return $localidad;
    }

    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM localidad WHERE id_localidad =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $localidad = self::_generarLocalidad($registro);

        return $localidad;
    }
    public function _generarListadoLocalidad($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $localidad = new Localidad ($registro['nombre']);
            $localidad->_descripcion = $registro['nombre'];
            $localidad->_idLocalidad = $registro['id_localidad'];
            $localidad->_idProvincia = $registro['id_provincia'];
            $localidad->setProvincia();
            $listado[] = $localidad;
            }
        return $listado;
    }   

    /**
     * @return mixed
     */
    public function getIdLocalidad()
    {
        return $this->_idLocalidad;
    }

    /**
     * @param mixed $_idLocalidad
     *
     * @return self
     */

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
     * @param mixed $_idProvincia
     *
     * @return self
     */
    public function setIdProvincia($_idProvincia)
    {
        $this->_idProvincia = $_idProvincia;

        return $this;
    }

    public function setProvincia(){
        $this->provincia = Provincia::obtenerPorIdLocalidad($this->_idLocalidad);
    }

    public function __toString()
    {   
        return $this->_descripcion;
    }
}
?>