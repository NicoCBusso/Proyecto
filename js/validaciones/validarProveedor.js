function validar(){
	//Validacion Nombre
	var razonSocial = document.getElementById("txtRazonSocial").value;
	if(razonSocial.trim() == ""){
		alert("El campo Razon Social no debe estar vacio");
		return;
	}
	if(razonSocial.length < 4){
		alert("El campo Razon Social debe contener al menos 4 caracteres");
		return;
	}
	if(razonSocial.length > 101){
		alert("El campo Razon Social debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(razonSocial)){
		alert("El razonSocial debe ser identificado sin numeros");
		return;
	}

	//Validacion CUIT
	var cuit = document.getElementById("txtCuit").value;
	if(isNaN(cuit)){
		alert("El cuit debe ser identificado con numeros");
		return;
	}
	if(cuit.length != 11){
		alert("El campo cuit debe contener 11 digitos");
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}