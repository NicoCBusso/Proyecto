<?php 
require_once '../../class/DetalleVenta.php';
$listadoProductoFinal = ProductoFinal::obtenerTodos();
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../../js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript">
		function cargarProductoFinal(){
			var idProductoFinal = $("#cboProductoFinal").val();

			var params = {id: idProductoFinal};

			$.get("obtenerProducto.php", params, function(datos){

				$("#txtPrecio").html(datos);
			});
		}
	</script>
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
		                    							<a href="#" role="button" class="btn btn-primary" id="anularVenta">Anular</a>
		                    							<a href="#" role="button" class="btn btn-primary" id="procesarVenta">Procesar</a>
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
				                    			<table id="datatable" class="table" style="width:100%">
							                      <thead>
							                        <tr>
							                            <th>Producto</th>
							                            <th>Precio</th>
							                            <th>Accion</th>							                          
							                        </tr>	                      
							                        <tr>							                          								                          	
							                            <td><select id="cboProductoFinal" class="form-control" onchange="cargarProductoFinal();">
							                            	<option>Seleccionar</option>
							                            	<?php foreach ($listadoProductoFinal as $productoFinal) :?>
							                            		<option value="<?php echo $productoFinal->getIdProductoFinal();?>"><?php echo $productoFinal->getNombre();?></option>
							                            	<?php endforeach ?>
							                            </select></td>
							                            <td id="txtPrecio">$0.00</td>
							                            <td><a href="#" role="button" class="btn btn-primary" id="agregarDetalleVenta">Agregar</a></td>							                            
							                        </tr>
							                        <tr>
							                          	<th>Descripcion</th>
							                          	<th>Precio</th>
							                        	<th>Accion</th>
							                        </tr>
							                        <tbody id="detalleVenta">
							                        	<tr>
							                        		<td></td>
							                        		<td></td>
							                        		<td>
							                        			<a href="#" role="button" class="btn btn-danger" onclick="eliminarDetalleVenta();">Eliminar</a>
							                        		</td>
							                        	</tr>
							                        </tbody>
							                        <tfoot>
							                        	<tr>
							                        		<td>Total</td>
							                        		<td>$0.00</td>
							                        	</tr>
							                        </tfoot>
							                      </thead>
							                    </table>
							                </div>
							            </div>
							        </div>
							    </div>

	                    	</div>
	                    </div>
  					<div>
  				</div>  				
  			</div>  			
  		</div>
  	</div>
  </div>
  <?php require_once"../../footer.php"; ?>              
</body>
</html>