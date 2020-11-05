<?php

require_once "Usuario.php";
require_once "DetalleVenta.php";

class Venta {

	public $_idVenta;
	public $_idUsuario;
	public $_arrDetalleVenta;
	public $_fechaHoraEmision;
	public $_fechaHoraExpiracion;
    public $_estado;
	public $_total;

	public $usuario;


    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->_idVenta;
    }

    /**
     * @param mixed $_idVenta
     *
     * @return self
     */
    public function setIdVenta($_idVenta)
    {
        $this->_idVenta = $_idVenta;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }

    /**
     * @param mixed $_idUsuario
     *
     * @return self
     */
    public function setIdUsuario($_idUsuario)
    {
        $this->_idUsuario = $_idUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArrDetalleVenta()
    {
        return $this->_arrDetalleVenta;
    }

    /**
     * @param mixed $_arrDetalleVenta
     *
     * @return self
     */

    public function setArrDetalleVenta()
    {
        $this->_arrDetalleVenta = DetalleVenta::obtenerPorIdVenta($this->_idVenta);

        return $this;
    }
    public function addDetalleFactura($detalleFactura) {
        $this->_arrDetalleVenta[] = $detalleFactura;
    }

    /**
     * @return mixed
     */
    public function getFechaHoraEmision()
    {
        return $this->_fechaHoraEmision;
    }

    /**
     * @param mixed $_fechaHoraEmision
     *
     * @return self
     */
    public function setFechaHoraEmision($_fechaHoraEmision)
    {
        $this->_fechaHoraEmision = $_fechaHoraEmision;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaHoraExpiracion()
    {
        return $this->_fechaHoraExpiracion;
    }

    /**
     * @param mixed $_fechaHoraExpiracion
     *
     * @return self
     */


    public function setFechaHoraExpiracion($_fechaHoraExpiracion)
    {
        $this->_fechaHoraExpiracion = $_fechaHoraExpiracion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     *
     * @return self
     */
    public function setUsuario()
    {
        $this->usuario = Usuario::obtenerPorId($this->_idUsuario);

        return $this;
    }
    public function guardar(){
        $sql = "INSERT INTO venta (id_venta,id_usuario,fecha_hora_emision,estado) VALUES (NULL,$this->_idUsuario,'$this->_fechaHoraEmision',$this->_estado);";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idVenta= $idInsertado;
        var_dump($sql);        
    }

    public function _generarVenta($registro){
    	$venta = new Venta();
    	$venta->_idVenta = $registro['id_venta'];
    	$venta->_idUsuario = $registro['id_usuario'];
    	$venta->setArrDetalleVenta();
    	$venta->_fechaHoraEmision = $registro['fecha_hora_emision'];
    	$venta->_fechaHoraExpiracion = $registro['fecha_hora_expiracion'];
        $venta->_estado = $registro['estado'];
        //$venta->obtenerTotal();    	
    	$venta->setUsuario();

    	return $venta;
    }

    public function _generarListadoVenta($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $venta = self::_generarVenta($registro);
            $listado[] = $venta;
            }
        return $listado;
    }
    /*public function _informeVenta($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $venta = new Venta();
            $venta->_idVenta = $registro['id_venta'];
            $venta->_idUsuario = $registro['id_usuario'];
            $venta->_arrDetalleVenta = DetalleVenta::informeConsumicion($venta->_idVenta);
            $venta->_fechaHoraEmision = $registro['fecha_hora_emision'];
            $venta->_fechaHoraExpiracion = $registro['fecha_hora_expiracion'];
            $venta->_estado = $registro['estado'];    
            $venta->setUsuario();
            $listado[] = $venta;
            }
        return $listado;
    }*/

    public static function obtenerTodos(){
    	$sql = "SELECT * FROM venta";
    	//var_dump($sql);
    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoVenta($datos);

        return $listado;
    }

    public static function obtenerPorId($id){
    	$sql = "SELECT * FROM venta WHERE id_venta = ". $id;

    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
        $registro = $datos->fetch_assoc();

        $venta = self::_generarVenta($registro);
        return $venta;
    }
    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->_total;
    }

    /**
     * @param mixed $_total
     *
     * @return self
     */
    public function obtenerTotal()
    {
        $total = 0;
        foreach ($this->_arrDetalleVenta as $detalleVenta) {
            if($detalleVenta->getEstado() == 1){
                $total = $total+$detalleVenta->getPrecio();
            }
        }
        $this->_total = $total;

        return $total;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * @param mixed $_estado
     *
     * @return self
     */
    public function setEstado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }
}

?>