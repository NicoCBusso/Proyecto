<?php
require_once 'MySQL.php';
require_once 'Persona.php';
require_once 'Direccion.php';
class Proveedor extends Persona{
	protected $_idProveedor;
	protected $_cuit;
	protected $_razonSocial;

	public function __construct($razonsocial) {
			$this->_razonSocial = $razonsocial;
		}
    public function guardar(){
    	parent::guardar();
    	$sql = "INSERT INTO proveedor (id_proveedor,cuit, razon_social, id_persona) VALUES (NULL,$this->_cuit,'$this->_razonSocial','$this->_idPersona')";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);
        $this->_idProveedor= $idInsertado;

    }
    public function actualizar() {
        $sql = "UPDATE proveedor SET cuit = $this->_cuit, razon_social = '$this->_razonSocial' WHERE id_proveedor = $this->_idProveedor";

        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }
    public static function obtenerTodos()
    {
        $sql="SELECT *  FROM proveedor INNER JOIN persona ON proveedor.id_persona = persona.id_persona";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProveedor($datos);

        return $listado;
    }
    public static function obtenerPorId($id)
    {
        $sql = "SELECT proveedor.id_proveedor, proveedor.razon_social, proveedor.cuit , proveedor.id_persona FROM proveedor INNER JOIN persona ON proveedor.id_persona = persona.id_persona WHERE id_proveedor =" . $id;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($datos->num_rows > 0){
          $registro = $datos->fetch_assoc();
          $proveedor = self::_generarProveedor($registro);
          return $proveedor;
        } else {
          return;   
        }
    }

    public static function consultarRazonSocial($razonSocial){
        $sql = "SELECT razon_social FROM proveedor WHERE razon_social =  '$razonSocial'";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($datos->num_rows > 0){
          $registro = $datos->fetch_assoc();
          $proveedor = self::_generarProveedor($registro);
          return $proveedor;
        } else {
          return;   
        }

    }

    public static function obtenerPorIdCompra($id){
        $sql = "SELECT * FROM proveedor INNER JOIN compra ON proveedor.id_proveedor = compra.id_proveedor WHERE compra.id_proveedor =". $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $proveedor = self::_generarProveedor($registro);
        return $proveedor;
    }

    public function _generarProveedor($registro)
    {
        $proveedor = new Proveedor($registro['razon_social']);
        $proveedor->_idProveedor = $registro['id_proveedor'];
        $proveedor->_idPersona = $registro['id_persona'];
        $proveedor->_cuit = $registro['cuit'];
        $proveedor->setDireccion();
        $proveedor->setArrContacto();
        return $proveedor;  
    }
    public function _generarListadoProveedor($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $proveedor = self::_generarProveedor($registro);
            $listado[] = $proveedor;
            }
        return $listado; 
    }


    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->_idProveedor;
    }

    /**
     * @param mixed $_idProveedor
     *
     * @return self
     */

    /**
     * @return mixed
     */
    public function getCuit()
    {
        return $this->_cuit;
    }

    /**
     * @param mixed $_cuit
     *
     * @return self
     */
    public function setCuit($_cuit)
    {
        $this->_cuit = $_cuit;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->_razonSocial;
    }

    /**
     * @param mixed $_razonSocial
     *
     * @return self
     */
    public function setRazonSocial($_razonSocial)
    {
        $this->_razonSocial = $_razonSocial;

        return $this;
    }
}	
?>