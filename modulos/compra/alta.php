<?php 
require_once '../../class/DetalleCompra.php';
require_once '../../class/TipoComprobante.php';
require_once '../../class/Proveedor.php';
$listadoProducto = Producto::obtenerTodos();
$listadoTipoComprobante = TipoComprobante::obtenerTodos();
$listadoProveedor = Proveedor::obtenerTodos();
?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarCompra.js"></script>
	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/functions/producto/functions.js"></script>
	<script type="text/javascript" src="../../utils/compra/buscarProducto.php"></script>
	<title>Glou Glou!</title>
</head>
<body class="nav-md">
  <?php require_once"../../menu.php"; ?>
  <?php if (isset($_SESSION['mensaje_error'])) :?>
		<h3><font color="red">
			<?php
				echo $_SESSION['mensaje_error']; 
		        unset($_SESSION['mensaje_error']);
		    ?>
	    </font></h3>
    <?php endif;?>
  <!-- page content -->
  <div class="right_col" role="main">
  	<div class="">
  		<div class="row">
  			<div class="col-md-12 col-sm-12">
  				<div class="x_panel">
  					<div class="x_title">
  						<h2>Registrar Compra<small></small></h2>
  						<ul class="nav navbar-right panel_toolbox">
	                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                      </li>
	                      <li><a class="close-link"><i class="fa fa-close"></i></a>
	                      </li>
	                    </ul>
	                    <div class="clearfix"></div>
	                    <div class="x_content">
	                    	<div class="row">
	                    		<div class="col-md-3 mb-3">
	                    			<div class="card-box table-responsive">
	                    				<div id="datos_venta">
	                    					<div id="datos">
		                    					<br>
		                    					<div>
		                    						<h5><p><label>Cajero/a : <?php echo $usuarioLogueado->getUsername();?></label></p></h5>	                    						
		                    					</div>
		                    					<div>
		                    						<div id="acciones_venta">
		                    							<a href="#" role="button" class="btn btn-primary" id="agregarConsumicion" onclick="abrirListaProductos();">Agregar</a>
		                    						</div>
		                    					</div>
		                    					<span id="estado"></span>
		                    				</div>
	                    				</div>	                      									
	                    			</div>
	                    		</div>
	                    		<div class="col-md-2 mb-3">
	                    			<div class="card-box table-responsive">
	                    				<div id="datos_venta">
	                    					<div id="datos">
		                    					<br>
		                    					<div>
		                    						<h5><p><label>Proveedor</label></p></h5>	                    						
		                    					</div>
		                    					<div class="item form-group">													
													</label>
													<div class="col-md-10 mb-3 ">
														<select name="cboProveedor" id="cboProveedor" class="form-control">
															<option value="0">Seleccionar</option>
															<?php foreach ($listadoProveedor as $proveedor): ?>
																<option value="<?php echo $proveedor->getIdProveedor();?>"><?php echo $proveedor->getRazonSocial()?></option>
															<?php endforeach ?>		
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>	
								<div class="col-md-2 mb-3">
	                    			<div class="card-box table-responsive">
	                    				<div id="datos_venta">
	                    					<div id="datos">
		                    					<br>
		                    					<div>
		                    						<h5><p><label>Tipo de Comprobante</label></p></h5>	                    						
		                    					</div>				
												<div class="item form-group">													
													</label>
													<div class="col-md-10 mb-3 ">
														<select name="cboTipoComprobante" id="cboTipoComprobante" class="form-control">
															<option value="0">Seleccionar</option>
															<?php foreach ($listadoTipoComprobante as $tipoComprobante): ?>
																<option value="<?php echo $tipoComprobante->getIdTipoComprobante();?>"><?php echo $tipoComprobante->getDescripcion()?></option>
															<?php endforeach ?>		
														</select>
													</div>
												</div>
		                    				</div>
	                    				</div>	                      									
	                    			</div>
	                    		</div>
	                    		<div class="col-md-4 mb-3">
	                    			<div class="card-box table-responsive">
	                    				<div id="datos_venta">
	                    					<div id="datos">
		                    					<br>
		                    					<div>
		                    						<h5><p><label>Fecha de Compra</label></p></h5>	                    						
		                    					</div>
					                    		<div class="item form-group">
													<div class="col-md-6 col-sm-6 ">
														<input id="txtFecha" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="txtFecha">
														<script>
															function timeFunctionLong(input) {
																setTimeout(function() {
																	input.type = 'text';
																}, 60000);
															}
														</script>
													</div>
												</div>
											</div>
										</div>
									</div>			
		                    	</div>
	                    </div>
                			<div class="row">
	                          	<div class="col-sm-12">
	                            	<div class="card-box table-responsive">
		                    			<table id="detalle_compra" class="table" style="width:100%">
					                      <thead>
					                        <tr>
					                        	<th>Codigo</th>
					                            <th>Consumicion</th>
					                            <th>Cantidad</th>
					                            <th>Precio</th>
					                            <th>Accion</th>							                          
					                        </tr>
					                       </thead>
					                    </table>
					                </div>
					            </div>
					        </div>
					        <div class="row">
	                          	<div class="col-sm-12">
	                            	<div class="card-box table-responsive">
		                    			<table class="table" style="width:100%">
					                      <tbody>
		                                    <tr>
			                                    <th class="w-50">Total:</th>
			                                    <td id="id_total">$0.0</td>
		                                    </tr>		                                    
		                                </tbody>
					                    </table>
					                </div>
					            </div>
					        </div>
					        <button type="button" class="btn btn-success" onclick="guardarFormularioVentas();">Guardar</button>

					        <a href="listado.php" role="button" class="btn btn-primary">Atras</a>
						</div>

	                </div>
                </div> 				
			</div>  			
		</div>
  		<!-- Button trigger modal -->
		
		<!-- Modal Lista Productos-->
		<div class="modal fade" id="id_lista_productos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Bebida</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <input id="id_txt_buscar" class="form-control" placeholder="Buscar producto" >
                <button onclick="buscarProductos()" class="btn btn-info">Buscar</button>
                <table class="table table-striped table-sm" id="id_tabla_productos">
                    <thead>
                        <tr>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Precio compra</th>
                        </tr>
                    </thead>
                    <tbody id="id_busqueda">
                        <tr>                           
                        </tr>
                    </tbody>
                    </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Listo</button>		        
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Modal Lista Productos-->
  	</div>
  </div>
  <script>
  	/*------------------
	variables globales
	-------------------*/

	//document.getElementById('id_message_validacion').style.display = 'none'; 
	//$('#id_message_validacion').hide();// se deshabilita el mensaje
	var id_detalle = 0;
	var total = 0.0;
	var vuelto = 0.0;
	var detalle_compra = []; // array
  	$.ajax({
		type: 'GET',
		url: '../../utils/compra/buscarProducto.php',
		data: {},
		success: function(data){
			var datos = JSON.parse(data);
			for (var x=0; x < datos.length; x++){
				console.log(datos[x]);
				row = generarFila(
					datos[x]._idProducto,
					datos[x]._nombre,
					datos[x]._precioCompra
					);
				$('#id_tabla_productos tr:last').after(row)		
			}
		}
	})
  	function generarFila(id,nombre,precio_compra) {
  		var row = '<tr onclick="setCantidadProducto(';
  		row += id + ",'";
  		row += nombre + "',";
  		row += precio_compra + ')"><td>';
  		row += id + '</td><td>';
  		row += nombre + '</td><td>';
  		row += '$' + precio_compra + '</td></trim>';; 
  		return row;
  	}
	function setCantidadProducto(id, descripcion, precio_compra)
	{
		 
		let cantidad = prompt('Ingrese la cantidad');
		if (cantidad == null || cantidad.trim() == ""){
			return false;
		}
		if(isNaN(cantidad)){
			return false;
		}
		let subtotal = calcularSubtotal(cantidad,precio_compra);
		let items = {}; //items del detalle
		items['id'] = id_detalle;
		items['id_producto'] = id;
		items['cantidad'] = cantidad;
		items['subtotal'] = subtotal 
		detalle_compra.push(items); //armando detalle para el envio
		$('#detalle_compra tr:last').after('<tr id=' + id_detalle + '><td >' + id + '</td><td>' + descripcion + '</td><td>' + cantidad + '</td><td>$' + subtotal + '</td> <td><a href="#" role="button" class="btn btn-danger" onclick="eliminarDetalle('+id_detalle+');">Eliminar</a></td></tr>')
		id_detalle++;
		console.log(detalle_compra);
	}

	//Funcion Borrar
	function eliminarDetalle(buscarIndex){
			let respuesta=[];
			for (let index = 0; index < detalle_compra.length; index++){
				if(detalle_compra[index].id !== buscarIndex){
					respuesta.push(detalle_compra[index])
					//console.log(respuesta[index]);
				} else {
					console.log('borra este id');
					console.log(index);
					$('#' + detalle_compra[index].id).remove();
					restarSubTotal(detalle_compra[index].subtotal);
					//respuesta.splice(index, 1);
				}

			} 
			detalle_compra = respuesta;
			console.log(detalle_compra);
			return detalle_compra;			
	}

	function buscarProductos()
	{
		alert($('#id_txt_buscar').val());
	    $.ajax({
	        type: 'GET',
	        url : '../../utils/compra/buscarProducto.php',
	        data: {
	            'text_buscar': $('#id_txt_buscar').val()
	        },
	        success: function(data){
	            var datos = JSON.parse(data);
	            $('#id_tabla_productos tbody tr').empty();
	            for (var x=0; x < datos.length; x++){
	                console.log(datos[x]);
	                row = generarFila(
					datos[x]._idProducto,
					datos[x]._nombre,
					datos[x]._precioCompra
					);
	                $('#id_tabla_productos').append(row)
	            }
	            //$('#id_productos').html(data)
	        }
	    })
	}

	/*-----------------
    funciones de calculo
	-------------------*/
	function restarSubTotal(precio){
		//let resultado 
	    //let resultado = parseFloat(cantidad) * parseFloat(precio);
	    total -= precio; //resta cantidad
	    $('#id_total').text('$' + total);
	    //console.log(total);
	    return total;
	}
	function calcularSubtotal(cantidad, precio){
	    let resultado = parseFloat(cantidad) * parseFloat(precio);
	    total += resultado; //acumula cantidad
	    $('#id_total').text('$' + total);
	    //console.log(total);
	    return resultado;
	}

	$('#id_pago').on('keypress',function(e) {
	    if(e.which == 13) {
	        calcularVuelto();
	    }
	});

	function calcularVuelto(){
	    let valor_pago= $('#id_pago').val();
	    let resultado =  valor_pago - total;
	    $('#id_vuelto').text('$' + resultado);
	}
	/*-----------------
    funciones de guardar
	-------------------*/
	function guardarFormularioVentas(){
		let proveedor = $('#cboProveedor').val();
		let fecha = $('#txtFecha').val();
		let tipoComprobante = $('#cboTipoComprobante').val();
		//alert(fecha);
		if(validar() != 1){
			if(detalle_compra.length >0){
				$.ajax({
					type: 'POST',
					url: 'procesar/insert.php',
					data: {
						'items': detalle_compra,
						'proveedor': proveedor,
						'tipoComprobante': tipoComprobante,
						'fecha': fecha
					},
					success: function(data){
						console.log(data)
						$("#estado").html(data)
					}
				})
			} else {
				alert('Error Bro');
			}
		//location.reload();
		}	
	}
	
  </script>
  <?php require_once"../../footer.php"; ?>              
</body>
</html>