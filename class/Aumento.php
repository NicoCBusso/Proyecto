<?php
require_once "MySQL.php";

class Aumento{

	public $_idAumento;
	public $_idProductoFinal;
	public $_porcentaje;

	public function guardar() {
        $sql = "INSERT INTO aumento (id_aumento,id_producto_final,porcentaje) VALUES (NULL,$this->_idProductoFinal,$this->_porcentaje)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idAumento = $idInsertado;
    }
    private function _generarAumento($registro) {
        $aumento = new Aumento();
        $aumento->_idAumento = $registro['id_aumento'];
        $aumento->_idProductoFinal = $registro['id_producto_final'];
        $aumento->_porcentaje = $registro['porcentaje'];
        return $aumento;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $aumento = Aumento::_generarAumento($registro);
            $listado[] = $aumento;
        }
        return $listado;
    }

    public static function obtenerTodos()
    {
        $sql= "SELECT * FROM aumento";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);

        return $listado;
    }

    /**
     * @return mixed
     */
    public function getIdAumento()
    {
        return $this->_idAumento;
    }

    /**
     * @param mixed $_idAumento
     *
     * @return self
     */
    public function setIdAumento($_idAumento)
    {
        $this->_idAumento = $_idAumento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProductoFinal()
    {
        return $this->_idProductoFinal;
    }

    /**
     * @param mixed $_idProductoFinal
     *
     * @return self
     */
    public function setIdProductoFinal($_idProductoFinal)
    {
        $this->_idProductoFinal = $_idProductoFinal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPorcentaje()
    {
        return $this->_porcentaje;
    }

    /**
     * @param mixed $_porcentaje
     *
     * @return self
     */
    public function setPorcentaje($_porcentaje)
    {
        $this->_porcentaje = $_porcentaje;

        return $this;
    }
}

?>