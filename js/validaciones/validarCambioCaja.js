function validar(){

	var idDetalleVenta = document.getElementById("idDetalleVenta").value;
	if(idDetalleVenta.trim() == ""){
		alert("Ingrese un ticket");
		return 1;
	}

}
