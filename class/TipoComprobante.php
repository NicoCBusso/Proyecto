<?php
require_once 'MySQL.php';

class TipoComprobante{

	private $_idTipoComprobante;
	private $_descripcion;

	public function __construct($descripcion){
		$this->_descripcion = $descripcion;
	}

    /**
     * @return mixed
     */
    public function getIdTipoComprobante()
    {
        return $this->_idTipoComprobante;
    }

    /**
     * @param mixed $_idTipoComprobante
     *
     * @return self
     */
    public function setIdTipoComprobante($_idTipoComprobante)
    {
        $this->_idTipoComprobante = $_idTipoComprobante;

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

    public function guardar(){
        $sql = "INSERT INTO tipocomprobante (id_tipo_comprobante,descripcion) VALUES (NULL,'$this->_descripcion','$this->_directorio')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idTipoComprobante= $idInsertado;
        echo "insertado";
    }
    public function actualizar() {

        $sql = "UPDATE tipocomprobante SET descripcion = '$this->_descripcion' WHERE id_tipo_comprobante = $this->_idTipoComprobante";
        var_dump($sql);
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM tipocomprobante WHERE id_tipo_comprobante =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $tipoComprobante = self::_generarTipoComprobante($registro);
        
        return $tipoComprobante;
    }
    private function _generarTipoComprobante($registro){
        $tipoComprobante = new TipoComprobante($registro['descripcion']);
        $tipoComprobante->_idTipoComprobante = $registro['id_tipo_comprobante'];
        return $tipoComprobante;
    }
    public static function obtenerTodos(){
        $sql = "SELECT * FROM tipocomprobante";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoTipoComprobantes($datos);

        return $listado;
    }

    public static function obtenerTipoComprobantesPorIdCompra($idCompra){
    	$sql = "SELECT tipocomprobante.id_tipo_comprobante, tipocomprobante.descripcion FROM tipocomprobante"
    		  ." INNER JOIN compra ON tipocomprobante.id_tipo_comprobante = compra.id_tipo_comprobante"
    		  ." WHERE compra.id_tipo_comprobante = ". $idCompra;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $tipoComprobante = self::_generarTipoComprobante($registro);
        
        return $tipoComprobante;

    }
    private function _generarListadoTipoComprobantes($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$tipoComprobante = self::_generarTipoComprobante($registro);
			$listado[] = $tipoComprobante;
		}
		return $listado;
    }
}


?>