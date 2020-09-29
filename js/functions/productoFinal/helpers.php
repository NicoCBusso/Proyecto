<?php
require_once '../../../class/Producto.php';

if (isset($_GET['text_buscar'])) {
	$listaProductos = ProductoFinal::buscarProductoFinal($_GET['text_buscar']);
} else {
	$listaProductos = ProductoFinal::obtenerTodosJSON();
}

$rows = array();
while ($r = mysqli_fetch_assoc($listaProductos)) {
	$rows[] = $r;
}
echo json_encode($rows);
?>