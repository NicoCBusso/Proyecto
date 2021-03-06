    <?php
require_once 'Direccion.php';
require_once 'Contacto.php';
require_once 'MySQL.php';

class Persona{
	protected $_idPersona;
	public $direccion;
	protected $_arrContacto;

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

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->_direccion;
    }

    /**
     * @param mixed $_arrDireccion
     *
     * @return self
     */
    public function setDireccion()
    {
        /*$this->_arrDireccion = $_arrDireccion;

        return $this;*/

        $this->direccion = Direccion::obtenerPorIdPersona($this->_idPersona);
    }

    /**
     * @return mixed
     */
    public function getArrContacto()
    {
        return $this->_arrContacto;
    }

    /**
     * @param mixed $_arrContacto
     *
     * @return self
     */
    public function setArrContacto()
    {
        $this->_arrContacto = Contacto::obtenerTodosPorIdPersona($this->_idPersona);

        return $this;
    }
    public function guardar(){
    	$sql = "INSERT INTO persona (id_persona) VALUES (NULL)";

    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idPersona = $idInsertado;
        echo "insertado";
    }

}

?>