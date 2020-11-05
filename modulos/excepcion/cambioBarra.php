<?php 
require_once '../../class/Excepcion.php';
require_once '../../class/Producto.php';
require_once '../../class/Puesto.php';
$listadoProductoFinal = ProductoFinal::obtenerTodos();
$listadoPuesto = Puesto::obtenerTodos();
?>
<!DOCTYPE html>
<html>
<head>
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
  						<h2>Venta<small></small></h2>
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
		                    						<h5><p><label>Jefe/a de Barra : <?php echo $usuarioLogueado->getUsername();?></label></p></h5>	                    						
		                    					</div>
		                    					<div>
		                    						<div id="acciones_venta">
		                    							<a href="#" role="button" class="btn btn-primary" id="agregarConsumicion" onclick="abrirListaProductos();">Agregar</a>
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
		                    						<h5><p><label>Puesto</label></p></h5>	                    						
		                    					</div>
					                    		<div class="item form-group">													
													</label>
													<div class="col-md-10 mb-3 ">
														<select name="cboPuesto" id="cboPuesto" class="form-control">
															<option value="0">Seleccionar</option>
															<?php foreach ($listadoPuesto as $puesto): ?>
																<option value="<?php echo $puesto->getIdPuesto();?>"><?php echo $puesto->getLugar()?></option>
															<?php endforeach ?>		
														</select>
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
		                    			<table id="detalle_cambio" class="table" style="width:100%">
					                      <thead>
					                        <tr>
					                        	<th>Codigo</th>
					                            <th>Consumisicion a cambiar</th>
					                            <th id="idConsumicionCambiada">Consumisicion cambiada</th>					                            
					                            <th>Accion</th>							                          
					                        </tr>
					                       </thead>
					                    </table>
					                </div>
					            </div>
					        </div>					        
					        <button type="button" class="btn btn-success" onclick="guardarFormularioVentas();">Guardar</button>
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
	var detalle_cambio = []; // array
  	$.ajax({
		type: 'GET',
		url: '../../utils/venta/buscarProductoFinal.php',
		data: {},
		success: function(data){
			var datos = JSON.parse(data);
			for (var x=0; x < datos.length; x++){
				console.log(datos[x]);
				row = generarFila(
					datos[x]._idProductoFinal,
					datos[x]._nombre,
					datos[x]._precioVenta
					);
				$('#id_tabla_productos tr:last').after(row)		
			}
		}
	})
  	function generarFila(id,nombre,precio_venta) {
  		var row = '<tr onclick="setCantidadProducto(';
  		row += id + ",'";
  		row += nombre + "',";
  		row += precio_venta + ')"><td>';
  		row += id + '</td><td>';
  		row += nombre + '</td><td>';
  		row += '$' + precio_venta + '</td></trim>';; 
  		return row;
  	}
	function setCantidadProducto(id, descripcion, precio_venta)
	{
		 
		/*let cantidad = prompt('Ingrese la cantidad');
		if (cantidad == null || cantidad.trim() == ""){
			return false;
		}
		if(isNaN(cantidad)){
			return false;
		}*/

		let items = {}; //items del detalle
		items['id'] = id_detalle;
		items['idConsumicionACambiar'] = id
		items['consumicionACambiar'] = descripcion;


		detalle_cambio.push(items); //armando detalle para el envio
		$('#detalle_cambio tr:last').after('<tr id=' + id_detalle + '><td >' + id + '</td><td>' + descripcion + '</td><td><a href="#" role="button" class="btn btn-danger" onclick="eliminarDetalle('+id_detalle+');">Eliminar</a></td></tr>')
		id_detalle++;
		console.log(detalle_cambio);
	}

	//Funcion Borrar
	function eliminarDetalle(buscarIndex){
			let respuesta=[];
			for (let index = 0; index < detalle_cambio.length; index++){
				if(detalle_cambio[index].id !== buscarIndex){
					respuesta.push(detalle_cambio[index])
					//console.log(respuesta[index]);
				} else {
					console.log('borra este id');
					console.log(index);
					$('#' + detalle_cambio[index].id).remove();
					restarSubTotal(detalle_cambio[index].subtotal);
					//respuesta.splice(index, 1);
				}

			} 
			detalle_cambio = respuesta;
			console.log(detalle_cambio);
			return detalle_cambio;			
	}

	/*function buscarProductos()
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
	}*/
	/*-----------------
    funciones de guardar
	-------------------*/
	function guardarFormularioVentas(){
		let idPuesto = $('#cboPuesto').val();
		if(detalle_cambio.length >0){
			$.ajax({
				type: 'POST',
				url: 'procesar/insertRotura.php',
				data: {
					'items': detalle_cambio,
					'idPuesto': idPuesto
				},
				success: function(data){
					console.log(data)
				}
			})
		} else {
			alert('Error Bro');
		}
		//location.reload();
	}
	
  </script>
  <?php require_once"../../footer.php"; ?>              
</body>
</html>