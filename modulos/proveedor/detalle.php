<?php
require_once '../../class/Proveedor.php';

$id = $_GET['id'];

$proveedor = Proveedor::obtenerPorId($id);
//highlight_string(var_export($proveedor,true));

?>

<!DOCTYPE html>
<html lang="es">

<body>
    <p><?php require_once "../../menu.php"; ?></p>  
    <table border="1" align="center">
    <thead>
     <tr>
        <th>ID</th>
        <th>Razon Social</th>
        <th>CUIT</th>
        <th>Direccion</th>
        <th>Localidad</th>
        <th>Provincia</th>
        <th>Pais</th>
     </tr>
    </thead>

    <tbody align="center">
      <tr>
        <td> <?php echo $proveedor->getIdProveedor(); ?> </td>
        <td> <?php echo $proveedor->getRazonSocial(); ?> </td>
        <td> <?php echo $proveedor->getCuit(); ?> </td>
        <td> <?php if(is_null($proveedor->direccion)): ?>
            <a href="/programacion3/Proyecto/modulos/direccion/alta.php?id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor">
            Agregar Domicilio
            </a>

        <?php else:?>
            <?php echo $proveedor->direccion; ?>

            <a href="/programacion3/Proyecto/modulos/direccion/actualizar.php?id_direccion=<?php echo $proveedor->direccion->getIdDireccion(); ?>&id_persona=<?php echo $proveedor->getIdPersona(); ?>&idLlamada=<?php echo $proveedor->getIdProveedor(); ?>&modulo=proveedor">
                Modificar Domicilio
            </a>
            <td><?php echo $proveedor->direccion->localidad->getDescripcion();?></td>
            <td><?php echo $proveedor->direccion->localidad->provincia->getDescripcion();?></td>
            <td><?php echo $proveedor->direccion->localidad->provincia->pais->getDescripcion();?></td>
        <?php endif ?>
      </tr>   

    </tbody>

</table>
<a href="listado.php">Volver al Listado</a>


</body>

</html>