function validar(){
	//Validacion Ingrediente
	var ingrediente = document.getElementById("cboProducto").value;
	if(ingrediente == 0){
		alert("Debe seleccionar el ingrediente");
		return;
	}
	var cantidad = document.getElementById("txtCantidad").value;
	if(isNaN(cantidad)){
		alert("El cantidad debe ser identificado con numeros");
		return;
	}
	if(cantidad.length < 2){
		alert("El campo Cantidad debe contener al menos 2 caracteres");
		return;
	}
	if(cantidad.length > 4	){
		alert("El campo Cantidad debe contener menos 5 caracteres");
		return;
	}
	var form = document.getElementById("frmDatos");
	form.submit();		
}