function validar(){
	//Validacion Provincia
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Provincia no debe estar vacio");
		return;
	}
	if(nombre.length < 3){
		alert("El campo Provincia debe contener al menos 3 caracteres");
		return;
	}
	if(nombre.length > 51){
		alert("El campo Provincia debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(nombre)){
		alert("El campo Provincia debe ser creado sin numeros");
		return;
	}
	var form = document.getElementById("frmDatos");
	form.submit();
}