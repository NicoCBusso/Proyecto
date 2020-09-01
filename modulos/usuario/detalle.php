<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$usuarioo = Usuario::obtenerPorId($id);
//highlight_string(var_export($usuarioo,true)); 
?>  

<!DOCTYPE html>
<html>
<head>
    <title>Detalle</title>
</head>
<body>
    <p align="center"><?php require_once"../../menu.php"; ?></p>
    <table border="1" align="center">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nro. Documento</th>
            <th>Fecha de Nacimiento</th>
            <th>Sexo</th>
            <th>Estado</th>
            <th>Direccion</th>
            <th>Localidad</th>
            <th>Provincia</th>
            <th>Pais</th>
        </thead>
        <tbody align="center">
            <td><?php echo $usuarioo->getIdUsuario();?></td>
            <td><?php echo $usuarioo->getNombre(); ?></td>
            <td><?php echo $usuarioo->getApellido();?></td>
            <td><?php echo $usuarioo->getDni()?></td>
            <td><?php echo $usuarioo->getFechaNacimiento()?></td>
            <td><?php echo $usuarioo->getSexo()?></td>
            <td><?php echo $usuarioo->getEstadoPersona()?></td>
            <td> <?php if(is_null($usuarioo->direccion)): ?>
                <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario">
                Agregar Domicilio
                </a>

            <?php else:?>
                <?php echo $usuarioo->direccion; ?>
                <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $usuarioo->direccion->getIdDireccion();?>&id_persona=<?php echo $usuarioo->getIdPersona(); ?>&idLlamada=<?php echo $usuarioo->getIdUsuario(); ?>&modulo=usuario">
                    Modificar Domicilio
                </a>
            </td>
            <td><?php echo $usuarioo->direccion->localidad->getDescripcion();?></td>
            <td><?php echo $usuarioo->direccion->localidad->provincia->getDescripcion();?></td>
            <td><?php echo $usuarioo->direccion->localidad->provincia->pais->getDescripcion();?></td>
            <?php endif ?>
        </tbody>
    </table>
    <p align="center"> <a href="listado.php">Volver al Listado</a></p>
</body>
</html>