<?php 

require_once '../../class/Excepcion.php';

$listadoTipoExcepcion = TipoExcepcion::obtenerTodos();
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
  						<h2>Cambio de Consumicion</h2>
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
		                    						<input type="hidden" id="idUsuario" value="<?php echo $usuarioLogueado->getIdUsuario();?>" name="">
		                    						<h5><p><label>Usuario: <?php echo $usuarioLogueado->getUsername();?></label></p></h5>	                    						
		                    					</div>
		                    					<div>		                    						
		                    					</div>
		                    				</div>
	                    				</div>	                      									
	                    			</div>
	                    		</div>
	                    		<div class="col-md-3 mb-3">
	                    			<div class="card-box table-responsive">
	                    				<div id="datos_venta">
	                    					<div id="datos">
		                    					<br>
		                    					<div>
		                    						<h5><p><label>Codigo Consumicion</label></p></h5>	                    						
		                    					</div>
		                    					<div>
		                    						<div id="acciones_venta">
		                    							<input type="number" name="idDetalleVenta" class="form-control" id="idDetalleVenta">
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
		                    			<table id="detalle_excepcion" class="table" style="width:100%">
					                      <thead>
					                        <tr>
					                            <th>Consumisicion a cambiar</th>
					                            <th id="idConsumicionCambiada">Consumisicion cambiada</th>					                            
					                            <th>Accion</th>							                          
					                        </tr>
					                        <tr =>
					                        	
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
		                                    <tr>
			                                    <th>Pago</th>
			                                    <td><input id="id_pago" type="number" class="form-control"></td>
		                                    </tr>
		                                    <tr>
			                                    <th>Vuelto:</th>
			                                    <td id="id_vuelto">$0.0</td>
		                                    </tr>
		                                </tbody>
					                    </table>
					                </div>
					            </div>
					        </div>					        
					        <button type="button" class="btn btn-success" onclick="guardarFormulario();">Guardar</button>

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
		      	<div>
		      		<table class="table table-striped table-sm">
		      			<thead>
                        <tr>
                        <th>Código</th>
                        <th>Consumicion</th>
                        <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody id="id_busqueda">
                        <td id="idConsumicion"></td>
                        <td id="nombreConsumicion"></td>
                        <td id="precioConsumicion"></td>
                    </tbody>
		      		</table>
		      	</div>
		        <input id="id_txt_buscar" class="form-control" placeholder="Buscar producto" >
                <button onclick="buscarProductos()" class="btn btn-info">Buscar</button>
                <table class="table table-striped table-sm" id="id_tabla_productos">
                    <thead>
                        <tr>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad Existente</th>
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
	var detalle_excepcion = [];
	var items = {}; // array
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
					datos[x]._precioVenta,
					datos[x].stock._stockActual
					);
				$('#id_tabla_productos tr:last').after(row)		
			}
		}
	})
  	function generarFila(id,nombre,precioVenta,cantidad) {
  		if(cantidad == null){
  			return;
  		}
  		var row = '<tr onclick="setCantidadProducto(';
  		row += id + ",'";
  		row += nombre + "',";
  		row += precioVenta + ')"><td>';
  		row += id + '</td><td>';
  		row += nombre + '</td><td>';
  		row += '$' + precioVenta + '</td><td>';
  		row += cantidad + '</td></trim>';; 
  		return row;
  	}
	function setCantidadProducto(id,descripcion,precioVenta)
	{	
		
		items['idConsumicionCambiada'] = id;
		items['consumicionCambiada'] = descripcion;
		let subtotal = calcularSubtotal(precioVenta,items['precioConsumicionACambiar']);
		console.log(items);
		detalle_excepcion.push(items);
		$('#detalle_excepcion tr:last').after('<tr id=' + id_detalle + '><td >' + items.consumicionACambiar + '</td><td>' + descripcion + '</td><td><a href="#" role="button" class="btn btn-danger" onclick="eliminarDetalle('+id_detalle+');">Eliminar</a></td></tr>')
		console.log(detalle_excepcion);
		id_detalle++;
	}

	//Funcion Borrar
	function eliminarDetalle(buscarIndex){
			let respuesta=[];
			for (let index = 0; index < detalle_excepcion.length; index++){
				if(detalle_excepcion[index].id !== buscarIndex){
					respuesta.push(detalle_excepcion[index])
					//console.log(respuesta[index]);
				} else {
					console.log('borra este id');
					console.log(index);
					$('#' + detalle_excepcion[index].id).remove();
					restarSubTotal(detalle_excepcion[index].subtotal);
					//respuesta.splice(index, 1);
				}
			} 
			detalle_excepcion = respuesta;
			console.log(detalle_excepcion);
			return detalle_excepcion;			
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
	                if (datos[x].stock != null){
						row = generarFila(
						datos[x]._idProducto,
						datos[x]._nombre,					
						datos[x].stock._stockActual
						);
		                $('#id_tabla_productos').append(row)
	            	}
	            }
	            //$('#id_productos').html(data)
	        }
	    })
	}*/

	//Buscar por Id Detalle Venta
	$('#idDetalleVenta').on('keypress',function(e) {	
	    if(e.which == 13) {
	    	let idDetalleVenta = $('#idDetalleVenta').val();
	        $.ajax({
	        type: 'POST',
	            url : '../../utils/detalleventa/traerDetalleVenta.php',
	            data: {
	                'idDetalleVenta': idDetalleVenta,

	            },
	            success: function(data){
	                let datos = JSON.parse(data);
	                console.log(datos);
	                items = {};
	                items['id'] = id_detalle;
					items['idDetalleVenta'] = datos._idDetalleVenta;
					items['idConsumicionACambiar'] = datos._idProductoFinal;
					items['consumicionACambiar'] = datos.productoFinal._nombre;
					items['precioConsumicionACambiar'] = datos._precio;
					//$('#idConsumicion').empty();
					$('#idConsumicion').append(items['idConsumicionACambiar']);
					//$('#nombreConsumicion').empty();
					$('#nombreConsumicion').append(items['consumicionACambiar']);
					//$('#precioConsumicion').empty();
					$('#precioConsumicion').append('$'+ items['precioConsumicionACambiar']);
					abrirListaProductos();	                	                
	            }
	        })
	    }
	});
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
	function calcularSubtotal(precioNuevo,precioAnterior){
	    let resultado = precioAnterior - precioNuevo;
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
	function guardarFormulario(){
	    let idPuesto = 5;
		let tipoExcepcion = $('#cboTipoExcepcion').val();		
		if(detalle_excepcion.length >0){
			$.ajax({
				type: 'POST',
				url: 'procesar/insertCaja.php',
				data: {
					'items': detalle_excepcion,
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