function cargarSubCategoria(){
	var idCategoria = $("#cboCategoria").val();

	var params = {id: idCategoria};

	$.get("obtenerSubCategorias.php", params, function(datos){

		$("#cboSubCategoria").html(datos);
	});
}