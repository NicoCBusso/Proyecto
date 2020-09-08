function validar(){
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Nombre no debe estar vacio");
		return;
	}

	if(!isNaN(nombre)){
		alert("El nombre debe ser identificado sin numeros");
		return;
	}	
		
	var form = document.getElementById("frmDatos");
	form.submit();
}
