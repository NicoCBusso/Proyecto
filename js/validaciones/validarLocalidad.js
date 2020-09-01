function validar(){
	//Validacion Localidad
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Localidad no debe estar vacio");
		return;
	}
	if(nombre.length < 3){
		alert("El campo Localidad debe contener al menos 3 caracteres");
		return;
	}
	if(nombre.length > 101){
		alert("El campo Localidad debe contener menos 100 caracteres");
		return;
	}
	if(!isNaN(nombre)){
		alert("El campo Localidad debe ser creado sin numeros");
		return;
	}
	//Validacion Sexo
	var provincia = document.getElementById("cboProvincia").value;
	if(provincia == 0){
		alert("Debe seleccionar el provincia");
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}