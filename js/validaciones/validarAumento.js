function validar(){

    var aumento = $('#txtPorcentaje').val();

	if(aumento.trim() == ""){
		alert("Ingrese el aumento");
		return 1;
	}
	if(aumento <= 0){
		alert("Aumento incorrecto");
		return 1;
	} 
	if(isNaN(aumento)){
		alert("Debe ser un numero");
		return 1;
	}
}
