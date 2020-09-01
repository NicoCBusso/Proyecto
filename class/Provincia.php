<?php
require_once 'MySQL.php';
require_once 'Pais.php';
class Provincia{
	private $_idProvincia;
	private $_descripcion;
    private $_idPais;

    public $pais;


	public function __construct($descripcion) {
		$this->_descripcion = $descripcion;
	}
    public function guardar(){
        $sql = "INSERT INTO provincia (id_provincia,nombre,id_pais) VALUES (NULL,'$this->_descripcion',$this->_idPais)";
    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idProvincia= $idInsertado;
        
    }
    public function actualizar() {
        $sql = "UPDATE provincia SET nombre = '$this->_descripcion',id_pais = $this->_idPais WHERE id_provincia= $this->_idProvincia";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        var_export($sql);
    }

    public static function obtenerTodos()
    {
        $sql= "SELECT * FROM provincia";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProvincia($datos);

        return $listado;
    }
    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM provincia WHERE id_provincia =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $provincia = self::_generarProvincia($registro);
        return $provincia;
    }
    public function _generarProvincia($registro){
        $provincia = new Provincia($registro['nombre']);
        $provincia->_idProvincia = $registro ['id_provincia'];
        $provincia->_idPais = $registro ['id_pais'];
        $provincia->setPais();
        return $provincia;        
    }

    public function _generarListadoProvincia($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $provincia = self::_generarProvincia($registro);
            $listado[] = $provincia;
            }
        return $listado;
    }    
    public static function obtenerPorIdLocalidad($id){
        $sql = "SELECT provincia.nombre, provincia.id_provincia, provincia.id_pais FROM localidad INNER JOIN provincia ON localidad.id_provincia = provincia.id_provincia WHERE id_localidad =" . $id;
        //var_dump($sql);
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $provincia = self::_generarProvincia($registro);

        return $provincia;
    }
    public static function obtenerPorIdPais($id){
        $sql = "SELECT provincia.id_provincia,provincia.nombre,provincia.id_pais FROM provincia INNER JOIN pais ON pais.id_pais = provincia.id_pais WHERE provincia.id_pais =". $id ;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProvincia($datos);
        return $listado;
    }  
    /**
     * @return mixed
     */
    public function getIdProvincia()
    {
        return $this->_idProvincia;
    }

    /**
     * @param mixed $_idProvincia
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
     * @return mixed
     */
    public function getIdPais()
    {
        return $this->_idPais;
    }

    /**
     * @param mixed $_idPais
     *
     * @return self
     */
    public function setPais()
    {
        $this->pais = Pais::obtenerPorIdProvincia($this->_idProvincia);

    }

    /**
     * @param mixed $_idPais
     *
     * @return self
     */
    public function setIdPais($_idPais)
    {
        $this->_idPais = $_idPais;

        return $this;
    }
}
?>