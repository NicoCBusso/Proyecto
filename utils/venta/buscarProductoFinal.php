<?php
require_once '../../class/Producto.php';

if (isset($_GET['text_buscar'])) {
	$listaProductos = ProductoFinal::buscarPorDescripcion($_GET['text_buscar']);
} else {
	$listaProductos = ProductoFinal::obtenerTodos();
}

echo json_encode($listaProductos);
?>