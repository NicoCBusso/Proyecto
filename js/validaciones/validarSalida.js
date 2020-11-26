function validar(){
	var puesto = document.getElementById("cboPuesto").value;
	if(puesto == 0){
		alert("Debe elegir el puesto");
		return 1;
	}
	var codigoBarra = document.getElementById("codigoBarra").value;
	var idDetalleVenta = document.getElementById("idDetalleVenta").value;
	if(codigoBarra.trim() == "" && idDetalleVenta.trim() == ""){
		alert("Campo vacio");
		return 1;
	}

}
