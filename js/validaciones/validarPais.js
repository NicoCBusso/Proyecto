function validar(){
	//Validacion Nombre
	var pais = document.getElementById("txtNombre").value;
	if(pais.trim() == ""){
		alert("El campo Pais no debe estar vacio");
		return;
	}
	if(pais.length < 4){
		alert("El campo Pais debe contener al menos 4 caracteres");
		return;
	}
	if(pais.length > 51){
		alert("El campo Pais debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(pais)){
		alert("El campo Pais debe ser identificado sin numeros");
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}