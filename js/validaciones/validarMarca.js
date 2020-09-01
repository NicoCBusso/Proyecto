function validar(){
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Marca no debe estar vacio");
		return;
	}
	if(nombre.length < 2){
		alert("El campo Marca debe contener al menos 2 caracteres");
		return;
	}
	if(nombre.length > 51){
		alert("El campo Marca debe contener menos 50 caracteres");
		return;
	}
		
	var form = document.getElementById("frmDatos");
	form.submit();
}