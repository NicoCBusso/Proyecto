function validar(){
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Nombre no debe estar vacio");
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}
