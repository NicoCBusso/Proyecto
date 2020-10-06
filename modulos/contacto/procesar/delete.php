<?php
require_once '../../../class/Contacto.php';
$idPersona = $_GET['id_persona'];
$idLlamada = $_GET['idLlamada'];
$modulo = $_GET['modulo'];
$idContacto = $_GET['id_contacto'];

$contacto = Contacto::obtenerPorId($idContacto);
$contacto->eliminar();

header("location: /programacion3/Proyecto/modulos/$modulo/detalle.php?id=$idLlamada");
?>