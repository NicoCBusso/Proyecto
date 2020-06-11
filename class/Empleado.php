<?php
require_once 'PersonaFisica.php';
//require_once 'Cargo.php';

class Empleado extends PersonaFisica{

	protected $_idEmpleado;
	protected $_idCargo;

    public function getEmpleado()
    {
        return $this->_idEmpleado;
    }

    public function getCargo()
    {
        return $this->_idCargo;
    }

    public function setCargo($_idCargo)
    {
        $this->_idCargo = $_idCargo; 

        return $this;
    }

    public static function obtenerTodos()
    {
        $sql="SELECT personafisica.id_persona_fisica, personafisica.nombre, personafisica.apellido, personafisica.dni, personafisica.fecha_nacimiento, personafisica.sexo, empleado.id_empleado FROM empleado INNER JOIN personafisica ON empleado.id_persona_fisica = personafisica.id_persona_fisica";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoEmpleado($datos);

        return $listado;
    }

    public static function obtenerPorId($id)
    {
        $sql = "SELECT * FROM empleado AS e INNER JOIN personafisica AS p ON e.id_persona_fisica = p.id_persona_fisica INNER JOIN persona ON p.id_persona = persona.id_persona WHERE id_empleado =" . $id;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $empleado = new Empleado($registro['nombre'], $registro['apellido']);
        $empleado->_idEmpleado = $registro['id_empleado'];
        $empleado->_idPersonaFisica = $registro['id_persona_fisica'];
        $empleado->_dni = $registro['dni'];
        $empleado->_fechaNacimiento = $registro['fecha_nacimiento'];
        $empleado->_sexo = $registro['sexo'];
        return $empleado;

    }

    public function _generarListadoEmpleado($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $empleado = new Empleado($registro['nombre'], $registro['apellido']);
            $empleado->_idEmpleado = $registro['id_empleado'];
            $empleado->_idPersonaFisica = $registro['id_persona_fisica'];
            $empleado->_dni = $registro['dni'];
            $empleado->_fechaNacimiento = $registro['fecha_nacimiento'];
            $empleado->_sexo= $registro['sexo'];
            $listado[] = $empleado;
            }
        return $listado; 

    }
    public function guardar(){
    	parent::guardar();
    	$sql = "INSERT INTO empleado (id_empleado,id_persona_fisica,id_cargo) VALUES (NULL,$this->_idPersonaFisica,$this->_idCargo)";
        echo "<br>";
        var_dump($sql);
    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idEmpleado= $idInsertado;
        echo "insertadddo";
    }	
    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE empleado SET id_cargo = $this->_idCargo WHERE id_empleado = $this->_idEmpleado";
        $mysql = new MySQL();
                var_dump($sql);
        $mysql->actualizar($sql);


    }

}

?>