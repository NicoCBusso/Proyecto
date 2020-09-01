function validar(){
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Nombre no debe estar vacio");
		return;
	}
	if(nombre.length < 4){
		alert("El campo Nombre debe contener al menos 4 caracteres");
		return;
	}
	if(nombre.length > 51){
		alert("El campo Nombre debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(nombre)){
		alert("El nombre debe ser identificado sin numeros");
		return;
	}	
		
	var form = document.getElementById("frmDatos");
	form.submit();
}
