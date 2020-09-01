function validar(){
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Marca no debe estar vacio");
		return;
	}
	if(nombre.length < 4){
		alert("El campo Marca debe contener al menos 4 caracteres");
		return;
	}
	if(nombre.length > 51){
		alert("El campo Marca debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(nombre)){
		alert("El envase debe ser identificado sin numeros");
		return;
	}	
		
	var form = document.getElementById("frmDatos");
	form.submit();
}
