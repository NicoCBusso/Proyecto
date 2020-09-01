<?php
require_once "ProductoFinal.php";
require_once "ProductoTrago.php";

class Trago extends ProductoFinal{

	protected $_idTrago;
	protected $_arrProductoTrago;

	public function guardar(){
		parent::guardar();
		$sql = "INSERT INTO trago (id_trago,id_producto_final) VALUES (NULL,$this->_idProductoFinal)";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idTrago= $idInsertado;
        echo "insertado";
	}
	public function actualizar(){
		parent::actualizar();
	}
	public static function obtenerTodos(){
		$sql= "SELECT * FROM trago INNER JOIN productofinal ON trago.id_producto_final = productofinal.id_producto_final";

		$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
        //var_dump($sql);

        $listado = self::_generarListadoTrago($datos);

        return $listado;
	}

	public static function obtenerPorId($id){
		$sql= "SELECT * FROM trago INNER JOIN productofinal ON trago.id_producto_final = productofinal.id_producto_final INNER JOIN producto_trago ON trago.id_trago = producto_trago.id_trago WHERE trago.id_trago =".$id;

		$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
        //var_dump($sql);

        $registro = $datos->fetch_assoc();
        $trago = self::_generarTrago($registro);

        return $trago;
	}
	private function _generarListadoTrago($datos){
		$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$trago = self:: _generarTrago($registro);
			$listado[] = $trago;
		}
		return $listado;
	}
	private function _generarTrago($registro){
		$trago = new Trago($registro['descripcion']);
		$trago->_idProductoFinal = $registro['id_producto_final'];
		$trago->_idTrago = $registro['id_trago'];
        $trago->_precioVenta = $registro['precio_venta'];
		$trago->_arrProductoTrago = ProductoTrago::obtenerPorIdTrago($trago->_idTrago); 
		return $trago;
	}
    /**
     * @return mixed
     */
    public function getIdTrago()
    {
        return $this->_idTrago;
    }

    /**
     * @param mixed $_idTrago
     *
     * @return self
     */


    /**
     * @return mixed
     */
    public function getArrProductoTrago()
    {
        return $this->_arrProductoTrago;
    }

    /**
     * @param mixed $_arrProductoTrago
     *
     * @return self
     */
    public function setArrProductoTrago($_arrProductoTrago)
    {
        $this->_arrProductoTrago = $_arrProductoTrago;

        return $this;
    }
}


?>