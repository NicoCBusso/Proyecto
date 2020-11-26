function validar(){
	var lugar = document.getElementById("txtLugar").value;
	if(lugar.trim() == ""){
		alert("El campo Nombre no debe estar vacio");
	}
	if(!isNaN(lugar)){
		alert("El nombre debe ser identificado sin numeros");
		return;
	}	
	var form = document.getElementById("frmDatos");
	form.submit();
}