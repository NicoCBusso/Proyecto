function validar(){
	//Validar Username
	var username = document.getElementById("txtUsername").value;
	if(username.trim() == ""){
		alert("El campo Username no debe estar vacio");
		return;
	}
	if(username.length < 6){
		alert("El campo Username debe contener al menos 6 caracteres");
		return;
	}
	if(username.length > 21){
		alert("El campo Username debe contener menos 20 caracteres");
		return;
	}
	if(!isNaN(username)){
		alert("El Username debe ser identificado solo con numeros");
		return;
	}
	//Validacion Password
	var password = document.getElementById("txtPassword").value;
	if(password.trim() == ""){
		alert("El campo Password no debe estar vacio");
		return;
	}
	if(password.length < 6){
		alert("El campo Password debe contener al menos 6 caracteres");
		return;
	}
	if(password.length > 21){
		alert("El campo Password debe contener menos 20 caracteres");
		return;
	}
	//Validacion Perfil
	var perfil = document.getElementById("cboPerfil").value;
	if(perfil == 0){
		alert("Debe seleccionar el perfil");
		return;
	}	
	//Validacion Nombre
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Nombre no debe estar vacio");
		return;
	}
	if(nombre.length < 3){
		alert("El campo Nombre debe contener al menos 3 caracteres");
		return;
	}
	if(nombre.length > 101){
		alert("El campo Nombre debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(nombre)){
		alert("El nombre debe ser identificado sin numeros");
		return;
	}
	//Validacion Apellido	
	var apellido = document.getElementById("txtApellido").value;
	if(apellido.trim() == ""){
		alert("El campo Apellido no debe estar vacio");
		return;
	}
	if(apellido.length < 3){
		alert("El campo Apellido debe contener al menos 3 caracteres");
		return;
	}
	if(apellido.length > 101){
		alert("El campo Apellido debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(apellido)){
		alert("El apellido debe ser identificado sin numeros");
		return;
	}
	//Validacion Edad FALTA

	//Validacion DNI
	var dni = document.getElementById("txtDni").value;
	if(isNaN(dni)){
		alert("El dni debe ser identificado con numeros");
		return;
	}
	if(dni.length != 8){
		alert("El campo dni debe contener 8 digitos, sin punto y agregar 0 en caso de valor menor 10 millones");
		return;
	}
	//Validacion Sexo
	var sexo = document.getElementById("cboSexo").value;
	if(sexo == 0){
		alert("Debe seleccionar el sexo");
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}