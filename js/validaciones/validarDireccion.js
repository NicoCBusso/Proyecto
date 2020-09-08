function validar(){
	//Validacion Pais
	var pais = document.getElementById("cboPais").value;
	if(pais == 0){
		alert("Debe seleccionar el pais");
		return;
	}	
	//Validacion Provincia
	var provincia = document.getElementById("cboProvincia").value;
	if(provincia == 0){
		alert("Debe seleccionar el provincia");
		return;
	}	
	//Validacion Localidad
	var localidad = document.getElementById("cboLocalidad").value;
	if(localidad == 0){
		alert("Debe seleccionar el localidad");
		return;
	}	
	//Validacion Calle
	var calle = document.getElementById("txtCalle").value;
	if(calle.trim() == ""){
		alert("El campo Calle no debe estar vacio");
		return;
	}
	if(calle.length < 4){
		alert("El campo Calle debe contener al menos 4 caracteres");
		return;
	}
	if(calle.length > 51){
		alert("El campo Calle debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(calle)){
		alert("El calle debe ser identificado sin numeros");
		return;
	}

	//Validacion Numero
	var numero = document.getElementById("txtNumero").value;
	if(numero.trim() == ""){
		alert("El campo altura no debe estar vacio");
		return;
	}
	if(isNaN(numero)){
		alert("El numero debe ser identificado con numeros");
		return;
	}
	if(numero.length > 4){
		alert("El campo numero debe tener una altura real");
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}