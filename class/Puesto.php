<?php
require_once 'MySQL.php';

class Puesto {

	public $_idPuesto;
	public $_lugar;


    public function guardar(){
        $sql = "INSERT INTO puesto (id_puesto,lugar) VALUES (NULL,'$this->_lugar')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPuesto= $idInsertado;
        var_dump($sql);
    }    
    public function actualizar() {
        $sql = "UPDATE puesto SET lugar = '$this->_lugar' WHERE id_puesto = $this->_idPuesto";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    private function _generarPuesto($registro){
        $puesto = new Puesto($registro['lugar']);
        $puesto->_idPuesto = $registro['id_puesto'];
        return $puesto;
    }

    public static function obtenerPorId($id){
        $sql = "SELECT * FROM puesto WHERE id_puesto =". $id;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $puesto = self::_generarPuesto($registro);
        return $puesto;
    }

    private function _generarListadoPuestos($datos){
        $listado = array();
            while ($registro = $datos->fetch_assoc()){
                $puesto = self::_generarPuesto($registro);
                $listado[] = $puesto;
            }
            return $listado;
    }

    public static function obtenerTodos()
    {
        $sql= "SELECT * FROM puesto";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoPuestos($datos);

        return $listado;
    }	

	public function __construct($lugar){
		$this->_lugar = $lugar;
	}

    /**
     * @return mixed
     */
    public function getIdPuesto()
    {
        return $this->_idPuesto;
    }

    /**
     * @param mixed $_idPuesto
     *
     * @return self
     */
    public function setIdPuesto($_idPuesto)
    {
        $this->_idPuesto = $_idPuesto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLugar()
    {
        return $this->_lugar;
    }

    /**
     * @param mixed $_lugar
     *
     * @return self
     */
    public function setLugar($_lugar)
    {
        $this->_lugar = $_lugar;

        return $this;
    }
}

?>