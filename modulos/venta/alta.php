<?php 
require_once '../../class/DetalleVenta.php';
$listadoProductoFinal = ProductoFinal::obtenerTodos();
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/functions/productoFinal/functions.js"></script>
	<script type="text/javascript" src="../../js/functions/productoFinal/helpers.php"></script>
	<title>Glou Glou!</title>
</head>
<body class="nav-md">
  <?php require_once"../../menu.php"; ?>
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
	                    		<div class="col-sm-12">
	                    			<div class="card-box table-responsive">
	                    				<div id="datos_venta">
	                    					<div id="datos">
		                    					<br>
		                    					<div>
		                    						<p><label>Cajero/a : <?php echo $usuarioLogueado->getUsername();?></label></p>		                    						
		                    					</div>
		                    					<div>
		                    						<label>Acciones</label>
		                    						<div id="acciones_venta">
		                    							<a href="#" role="button" class="btn btn-primary" id="agregarConsumicion" onclick="abrirListaProductos();">Agregar</a>
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
		                    			<table id="detalle_venta" class="table" style="width:100%">
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
                        <th class="text-center">Código</th>
                        <th>Producto</th>
                        <th>precio</th>
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
	var total = 0.0;
	var vuelto = 0.0;
	var detalle_venta = []; // array
  	$.ajax({
		type: 'GET',
		url: '../../js/functions/productoFinal/helpers.php',
		data: {},
		success: function(data){
			var datos = JSON.parse(data);
			for (var x=0; x < datos.length; x++){
				console.log(datos[x]);
				$('#id_tabla_productos tr:last').after('<tr onclick="setCantidadProducto(' + datos[x].id_producto_final + ",'"  + datos[x].descripcion  + "',"  + datos[x].precio_venta + ')"><td>'+ datos[x].id_producto_final + '</td><td>' + datos[x].descripcion + '</td><td>' + datos[x].precio_venta + '</td></tr>')
			}
		}
	})
	function setCantidadProducto(id, descripcion, precio_venta){
		let cantidad = prompt('Ingrese la cantidad');
		let subtotal = calcularSubtotal(cantidad,precio_venta);
		let items = {}; //items del detalle

		items['id_producto_final'] = id;
		items['cantidad'] = cantidad;

		detalle_venta.push(items); //armando detalle para el envio

		$('#detalle_venta tr:last').after('<tr><td >' + id + '</td><td>' + descripcion + '</td><td>' + cantidad + '</td><td>$' + subtotal + '</td> <td><a href="#" role="button" class="btn btn-danger" onclick="eliminarDetalleVenta();">Eliminar</a></td></tr>')

		//console.log(descripcion);
	}
	function buscarProductos(){
	    $.ajax({
	        type: 'GET',
	        url : '../../js/functions/productoFinal/helpers.php',
	        data: {
	            'text_buscar': $('#id_txt_buscar').val()
	        },
	        success: function(data){
	            var datos = JSON.parse(data);
	            $('#id_tabla_productos').empty();
	            for (var x=0; x < datos.length; x++){
	                console.log(datos[x]);
	                $('#id_tabla_productos').append('<tr onclick="setCantidadProducto(' + datos[x].id_producto_final + ",'"  + datos[x].descripcion  + "',"  + datos[x].precio_venta + ')"><td >' + datos[x].id_producto_final + '</td><td>' + datos[x].descripcion + '</td><td>' + datos[x].precio_venta + '</td></tr>')
	            }
	            //$('#id_productos').html(data)
	        }
	    })
	}

	/*-----------------
    funciones de calculo
	-------------------*/
	function calcularSubtotal(cantidad, precio){
	    let resultado = parseFloat(cantidad) * parseFloat(precio);
	    total += resultado; //acumula cantidad
	    $('#id_total').text('$' + total);
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
		if(detalle_venta.length >0){
			$.ajax({
				type: 'POST',
				url: 'procesar/insert.php',
				data: {
					'items': detalle_venta
				},
				success: function(data){
					console.log(data)
				}
			})
		} else {
			alert('Error Bro');
		}
	}

  </script>
  <?php require_once"../../footer.php"; ?>              
</body>
</html>