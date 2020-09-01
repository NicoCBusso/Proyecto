<?php
require_once '../../../class/ProductoTrago.php';

$idIngrediente = $_GET['id'];
$idTrago = $_GET['idTrago'];

$ingrediente = ProductoTrago::obtenerPorId($idIngrediente);
$ingrediente->eliminar();

header("location: ../listado.php?id=$idTrago");
?>