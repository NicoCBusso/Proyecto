function abrirListaProductos(){
	$('#id_lista_productos').modal('show');
}
function cargarSubCategoria(){
	var idCategoria = $("#cboCategoria").val();

	var params = {id: idCategoria};

	$.get("../../utils/categoria/obtenerSubCategorias.php", params, function(datos){

		$("#cboSubCategoria").html(datos);
	});
}
