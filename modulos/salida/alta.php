<?php 
require_once '../../class/Salida.php';
require_once '../../class/ProductoFinal.php';
$listadoProductoFinal = ProductoFinal::obtenerTodos();
$listadoPuesto = Puesto::obtenerTodos()
?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarSalida.js"></script>
	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../../js/functions/producto/functions.js"></script>
	<script type="text/javascript" src="../../utils/compra/buscarProducto.php"></script>
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
  						<h2>Salida de productos<small></small></h2>
  						<ul class="nav navbar-right panel_toolbox">
	                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                      </li>
	                      <li><a class="close-link"><i class="fa fa-close"></i></a>
	                      </li>
	                    </ul>
	                    <div class="clearfix"></div>
	                    <div class="x_content">
	                    	<div class="row">

	                    		<?php if (isset($_SESSION['mensaje_error'])) :?>
									<h3><font color="red">
										<?php
											echo $_SESSION['mensaje_error']; 
									        unset($_SESSION['mensaje_error']);
									    ?>
								    </font></h3>
							    <?php endif;?>
	                    		<div class="col-md-3 mb-3">
	                    			<div class="card-box table-responsive">
	                    				<div id="datos_venta">
	                    					<div id="datos">
		                    					<br>
		                    					<div>
		                    						<h5><p><label>Consumicion</label></p></h5>	                    						
		                    					</div>
		                    					<div>
		                    						<div id="acciones_venta">
		                    							<input type="number" name="idDetalleVenta" class="form-control" id="idDetalleVenta">
		                    						</div>
		                    					</div>
		                    				</div>
		                    				<div>
		                    					<span id="estado"></span>
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
								<div class="col-md-3 mb-3">
	                    			<div class="card-box table-responsive">
	                    				<div id="datos_venta">
	                    					<div id="datos">
		                    					<br>
		                    					<div>
		                    						<h5><p><label>Salida Botellas</label></p></h5>	                    						
		                    					</div>
		                    					<div>
		                    						<div>
		                    							<input type="number" name="codigoBarra" class="form-control" id="codigoBarra" value="">
		                    						</div>
		                    					</div>
		                    				</div>
	                    				</div>	                      									
	                    			</div>
	                    		</div>
	                    </div>
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
                        <th>Cantidad existente</th>
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
	var detalle_solicitud = []; // array
  	$.ajax({
		type: 'GET',
		url: '../../utils/compra/buscarProducto.php',
		data: {},
		success: function(data){
			var datos = JSON.parse(data);
			for (var x=0; x < datos.length; x++){
				if (datos[x].stock != null){
					row = generarFila(
					datos[x]._idProducto,
					datos[x]._nombre,					
					datos[x].stock._stockActual
					);
				$('#id_tabla_productos tr:last').after(row)	
				}					
			}
		}
	})
  	function generarFila(id,nombre,cantidad) {
  		if(cantidad == 0){
  			return;
  		}
  		var row = '<tr onclick="setCantidadProducto(';
  		row += id + ",'";
  		row += nombre + "',";
  		row += cantidad + ')"><td>';
  		row += id + '</td><td>';
  		row += nombre + '</td><td>';
  		row += cantidad + '</td></trim>';; 
  		return row;
  	}

	//Buscar Producto por text
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
	}
	//Buscar por Id Detalle Venta
	$('#idDetalleVenta').on('keypress',function(e) {
	    let puesto = $('#cboPuesto').val();
	    if(e.which == 13) {
	    	if(validar() != 1){
		        $.ajax({
		        type: 'POST',
		            url : 'procesar/insert.php',
		            data: {
		                'idDetalleVenta': $('#idDetalleVenta').val(),
		                'codigoBarra': $('#codigoBarra').val(),
		                'puesto': puesto
		            },
		            success: function(data){
		                console.log(data);
		                $("#estado").html(data);
		            }
		        })
		    }
	    }
	});
	$('#codigoBarra').on('keypress',function(e) {
	    let puesto = $('#cboPuesto').val();	
	    if(e.which == 13) {
	    	if(validar() != 1){
		        $.ajax({
		        type: 'POST',
		            url : 'procesar/insert.php',
		            data: {
		                'idDetalleVenta': $('#idDetalleVenta').val(),
		                'codigoBarra': $('#codigoBarra').val(),
		                'puesto': puesto
		            },
		            success: function(data){
		                console.log(data);
		                $("#estado").html(data)
		            }
		        })
		    }
	    }
	});

  </script>
  <?php require_once"../../footer.php"; ?>              
</body>
</html>