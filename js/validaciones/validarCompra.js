function validar(){

	var proveedor = $('#cboProveedor').val();
	var fecha = $('#txtFecha').val();
	var tipoComprobante = $('#cboTipoComprobante').val();
	var fechaActual = Date.now('yyyy','mm','dd');
	var fechaAux = document.getElementById("txtFecha").value.split("-");
	var fechaCompra = new Date(parseInt(fechaAux[0]),parseInt(fechaAux[1]-1),parseInt(fechaAux[2]));
	if(proveedor.trim() == ""){
		alert("El campo Proveedor no debe estar vacio");
		return 1;
	}
	if(proveedor == 0){
		alert("El campo Proveedor ser seleccionado");
		return 1;
	}

	if(isNaN(proveedor)){
		alert("El campo Proveedor debe ser numerico");
		return 1;
	}

	if(tipoComprobante.trim() == ""){
		alert("El campo Tipo Comprobante no debe estar vacio");
		return 1;
	}
	if(tipoComprobante == 0){
		alert("El campo Tipo Comprobante ser seleccionado");
		return 1;
	}

	if(isNaN(tipoComprobante)){
		alert("El campo Tipo Comprobante debe ser numerico");
		return 1;
	}	

	if(fecha.trim() == ""){
		alert("El campo Fecha no debe estar vacio");
		return 1;
	}
	if(fecha < fechaActual){
		alert("Fecha erronea");
		return 1;
	}

	if(fechaCompra.valueOf() > fechaActual.valueOf()){
		alert("Fecha erronea");
		return 1;
	}
}
