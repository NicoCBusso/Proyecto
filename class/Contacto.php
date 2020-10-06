<?php
require_once 'TipoContacto.php';
require_once 'MySQL.php';


class Contacto {

    private $_idContacto;
    private $_idPersona;
    private $_idTipoContacto;
    private $_valor;

    public $tipoContacto;
    /**
     * @return mixed
     */
    public function getIdContacto()
    {
        return $this->_idContacto;
    }

    /**
     * @param mixed $_idContacto
     *
     * @return self
     */
    public function setIdContacto($_idContacto)
    {
        $this->_idContacto = $_idContacto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * @param mixed $_idPersona
     *
     * @return self
     */
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdTipoContacto()
    {
        return $this->_idTipoContacto;
    }

    /**
     * @param mixed $_idTipoContacto
     *
     * @return self
     */
    public function setIdTipoContacto($_idTipoContacto)
    {
        $this->_idTipoContacto = $_idTipoContacto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->_valor;
    }

    /**
     * @param mixed $_valor
     *
     * @return self
     */
    public function setValor($_valor)
    {
        $this->_valor = $_valor;

        return $this;
    }

    public function guardar() {
        $sql = "INSERT INTO persona_contacto (id_contacto, valor, id_tipo_contacto, id_persona) VALUES (NULL, '$this->_valor', $this->_idTipoContacto, $this->_idPersona) ";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idContacto = $idInsertado;
    }

    public function eliminar(){
        $sql = "DELETE FROM persona_contacto WHERE id_contacto = $this->_idContacto;";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    private function _generarContacto($registro) {
        $contacto = new Contacto();
        $contacto->_idContacto = $registro['id_contacto'];
        $contacto->_idPersona = $registro['id_persona'];
        $contacto->_idTipoContacto = $registro['id_tipo_contacto'];
        $contacto->setTipoContacto();
        $contacto->_valor = $registro['valor'];
        return $contacto;
    }

    public static function obtenerTodosPorIdPersona($idPersona) {
        $sql = "SELECT persona_contacto.id_contacto, persona_contacto.id_persona, "
             . "persona_contacto.id_tipo_contacto, persona_contacto.valor, "
             . "tipocontacto.descripcion "
             . "FROM persona_contacto "
             . "INNER JOIN tipocontacto on tipocontacto.id_tipo_contacto = persona_contacto.id_tipo_contacto "
             . "WHERE persona_contacto.id_persona =" . $idPersona;      
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoContacto($datos);
        return $listado;        
    }

    public static function obtenerPorId($idContacto) {
        $sql = "SELECT * FROM persona_contacto INNER JOIN tipocontacto ON tipocontacto.id_tipo_contacto = persona_contacto.id_tipo_contacto WHERE id_contacto =" . $idContacto;
        //var_dump($sql);  
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $contacto = self::_generarContacto($registro);
        return $contacto;        
    }


    private function _generarListadoContacto($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $contacto = Contacto::_generarContacto($registro);
            $listado[] = $contacto;
        }
        return $listado;
    }

    public function __toString() {
        return $this->_valor;
    }

    /**
     * @return mixed
     */
    public function getTipoContacto()
    {
        return $this->tipoContacto;
    }

    /**
     * @param mixed $tipoContacto
     *
     * @return self
     */
    public function setTipoContacto()
    {
        $this->tipoContacto = TipoContacto::obtenerPorId($this->_idTipoContacto);

        return $this;
    }
}


?>