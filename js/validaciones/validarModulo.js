function validar(){
	//Validar Nombre
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Nombre no debe estar vacio");
		return;
	}
	if(nombre.length < 6){
		alert("El campo Nombre debe contener al menos 6 caracteres");
		return;
	}
	if(nombre.length > 51){
		alert("El campo Nombre debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(nombre)){
		alert("El Nombre debe ser identificado solo con numeros");
		return;
	}
	//Validar Directorio
	var directorio = document.getElementById("txtDirectorio").value;
	if(directorio.trim() == ""){
		alert("El campo Directorio no debe estar vacio");
		return;
	}
	if(directorio.length < 6){
		alert("El campo Directorio debe contener al menos 6 caracteres");
		return;
	}
	if(directorio.length > 51){
		alert("El campo Directorio debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(directorio)){
		alert("El Directorio debe ser identificado solo con numeros");
		return;
	}
	var form = document.getElementById("frmDatos");
	form.submit();
}