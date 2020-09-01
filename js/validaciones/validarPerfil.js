function validar(){
	//Validacion Nombre
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Perfil no debe estar vacio");
		return;
	}
	if(nombre.length < 3){
		alert("El campo Perfil debe contener al menos 3 caracteres");
		return;
	}
	if(nombre.length > 101){
		alert("El campo Perfil debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(nombre)){
		alert("El campo Perfil debe ser identificado sin numeros");
		return;
	}
	//Validacion Modulos
	var perfil = document.getElementById("cboModulos").value;
	if(perfil == 0){
		alert("Debe seleccionar modulos");
		return;
	}	

	var form = document.getElementById("frmDatos");
	form.submit();
}