function validar(){
	var puesto = document.getElementById("cboPuesto").value;
	if(puesto == 0){
		alert("Debe elegir el puesto");
		return 1;
	}
}
