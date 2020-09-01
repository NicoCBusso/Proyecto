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
	//Validacion CpdigoBarra
	var codigoBarra = document.getElementById("txtCodigoBarra").value;
	if(isNaN(codigoBarra)){
		alert("El campo Codigo Barra debe ser identificado con numeros");
		return;
	}
	if(codigoBarra.length != 10){
		alert("El campo Codigo Barra debe contener 10 digitos, sin punto");
		return;
	}
	//Validacion Contenido
	var contenido = document.getElementById("txtContenido").value;
	if(isNaN(contenido)){
		alert("El contenido debe ser identificado con numeros");
		return;
	}
	if(contenido.length < 2){
		alert("El campo Contenido debe contener al menos 2 caracteres");
		return;
	}
	if(contenido.length > 4	){
		alert("El campo Contenido debe contener menos 5 caracteres");
		return;
	}
	//Validacion Precio Compra
	var precioCompra = document.getElementById("txtPrecioCompra").value;

	if(isNaN(precioCompra)){
		alert("El campo Precio Compra debe ser identificado con numeros");
		return;
	}
	//Validacion Precio Venta
	var precioVenta = document.getElementById("txtPrecioVenta").value;
	if(precioVenta.trim() == ""){
		alert("El campo Precio Venta no debe estar vacio");
		return;
	}
	if(isNaN(precioVenta)){
		alert("El campo Precio Venta debe ser identificado con numeros");
		return;
	}
		
	//Validacion Envase
	var envase = document.getElementById("cboEnvase").value;
	if(envase == 0){
		alert("Debe seleccionar el envase");
		return;
	}
	//Validacion Marca
	var marca = document.getElementById("cboMarca").value;
	if(marca == 0){
		alert("Debe seleccionar el marca");
		return;
	}
	//Validacion Categoria
	var categoria = document.getElementById("cboCategoria").value;
	if(categoria == 0){
		alert("Debe seleccionar el categoria");
		return;
	}
	//Validacion SubCategoria
	var subcategoria = document.getElementById("cboSubCategoria").value;
	if(subcategoria == 0){
		alert("Debe seleccionar el subcategoria");
		return;
	}	

	var form = document.getElementById("frmDatos");
	form.submit();
}