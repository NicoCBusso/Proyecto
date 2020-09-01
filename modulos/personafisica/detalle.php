<?php

require_once '../../class/PersonaFisica.php';

$id = $_GET['id'];

$personaFisica = PersonaFisica::obtenerPorId($id);
//highlight_string(var_export($personaFisica,true));

?>

<!DOCTYPE html>
<html lang="es">

<body>
    <?php require_once "../../menu.php"; ?>
    <table border="1" align="center">
    <thead>
     <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Nro. Documento</th>
        <th>Fecha de Nacimiento</th>
        <th>Sexo</th>
        <th>Estado</th>
        <th>Direccion</th>
     </tr>
    </thead>

    <tbody align="center">
      <tr>
        <td> <?php echo $personaFisica->getPersonaFisica(); ?> </td>
        <td> <?php echo $personaFisica->getNombre(); ?> </td>
        <td> <?php echo $personaFisica->getApellido(); ?> </td>
        <td> <?php echo $personaFisica->getDni(); ?> </td>
        <td> <?php echo $personaFisica->getFechaNacimiento(); ?> </td>
        <td> <?php echo $personaFisica->getSexo(); ?> </td>
        <td> <?php echo $personaFisica->getEstadoPersona(); ?> </td>
        <td> <?php if(is_null($personaFisica->_direccion)): ?>
            <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $personaFisica->getIdPersona(); ?>&idLlamada=<?php echo $personaFisica->getPersonaFisica(); ?>&modulo=personafisica">
            Agregar Domicilio
            </a>

        <?php else:?>
            <?php echo $personaFisica->_direccion; ?>
            <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $personaFisica->_direccion->getIdDireccion();  ?>">
                Modificar Domicilio
            </a>

        <?php endif ?>
      </tr>   

    </tbody>

</table>
<a href="listado.php">Volver al Listado</a>


</body>

</html>