function validar(){
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Nombre no debe estar vacio");
		return;
	}
	if(nombre.length < 3){
		alert("El campo Nombre debe contener al menos 3 caracteres");
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
	var categoria = document.getElementById("cboCategoria").value;
	if(categoria == 0){
		alert("Debe seleccionar el categoria");
		return;
	}	
	var form = document.getElementById("frmDatos");
	form.submit();
}
