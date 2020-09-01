function validar(){
	//Validacion Nombre
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Nombre no debe estar vacio");
		return;
	}
	if(nombre.length < 6){
		alert("El campo Nombre debe contener al menos 6 caracteres");
		return;
	}
	if(nombre.length > 101){
		alert("El campo Nombre debe contener menos 100 caracteres");
		return;
	}
	if(!isNaN(nombre)){
		alert("El campo Nombre no debe ser identificado con numeros");
		return;
	}	
	//Validacion Precio Venta
	var precioVenta = document.getElementById("txtPrecioVenta").value;
	if(isNaN(precioVenta)){
		alert("El campo Precio Venta debe ser identificado con numeros");
		return;
	}
	if(precioVenta.trim() == ""){
		alert("El campo Precio Venta no debe estar vacio");
		return;
	}		
	var form = document.getElementById("frmDatos");
	form.submit();
}