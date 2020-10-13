<?php
require_once '../../class/Producto.php';

if (isset($_GET['text_buscar'])) {
	$listaProductos = Producto::buscarPorDescripcion($_GET['text_buscar']);
} else {
	$listaProductos = Producto::obtenerTodos();
}

echo json_encode($listaProductos);
?>