<?php 
require_once '../../class/Trago.php';
$idTrago = $_GET['id'];
$trago = Trago::obtenerPorId($idTrago);
//highlight_string(var_export($trago,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Lista de Tragos</title>
</head>
<body class="nav-md">
  <?php require_once"../../menu.php"; ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
    	<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Trago <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <p class="text-muted font-13 m-b-30">
		                      <a href="listado.php" role="button" class="btn btn-primary">Atras</a>
		                    </p>	
                    <table id="datatable" class="table" style="width:100%">
                      <thead>
                        <tr>
                        	<th>ID</th>
                        	<th>Nombre</th>
                        	<th>Precio Venta</th>
                        </tr>
                      </thead>
                        <tbody>
                          <tr>
                          	<td> <?php echo $trago->getIdTrago();?></td>
                            <td> <?php echo $trago->getNombre(); ?> </td>
                            <td> <?php echo $trago->getPrecioVenta(); ?>$ </td>                            
                          </tr>
                        </tbody>
                    </table>
                  </div>
                  </div>
              </div>
        </div>	    
    </div>
    <div class="row">
	              <div class="col-md-12 col-sm-12 ">
	                <div class="x_panel">
	                  <div class="x_title">
	                    <h2>Lista de Ingredientes <small></small></h2>
	                    <ul class="nav navbar-right panel_toolbox">
	                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                      </li>
	                      <li><a class="close-link"><i class="fa fa-close"></i></a>
	                      </li>
	                    </ul>
	                    <div class="clearfix"></div>
	                  </div>
	                  <div class="x_content">
	                      <div class="row">
	                          <div class="col-sm-12">
	                            <div class="card-box table-responsive">	                    
	                    <table id="datatable" class="table" style="width:100%">
	                      <thead>
	                        <tr>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Opciones</th>
							</tr>
	                      </thead>
	                      <?php foreach($trago->getArrProductoTrago() as $ingredientes) :?>
							<tbody>
									<td><?php echo $ingredientes->getIdProducto();?></td>
									<td><?php echo $ingredientes->producto->getNombre();?></td>
									<td><?php echo $ingredientes->getCantidad();?></td>	
							</tbody>			
						  <?php endforeach ?>
	                    </table>
	                    
	                  </div>
	                  </div>
	              </div>
	    </div>
  </div>

  <?php require_once"../../footer.php"; ?>              
</body>
</html>
<?php /*
<body>
	<p align="center"><?php require_once"../../menu.php"; ?></p>
	<a href="alta.php"  role="button">Agregar</a>
	<table align="center" border="1 " width="60% ">
    <thead>
      <tr>
      	<th>ID</th>
        <th>Trago</th>
        <th>Precio Venta</th>
      </tr>
    </thead>
      <tbody align="center">
        <tr>
        	<td> <?php echo $trago->getIdTrago();?></td>
			<td> <?php echo $trago->getNombre(); ?> </td>
			<td> <?php echo $trago->getPrecioVenta()?>$</td>
        </tr>
      </tbody>
	</table>
	<br>
	<table align="center" border="1 " width="60% ">
		<thead>
			<tr>
				<th>ID</th	>
				<th>Ingrediente</th>
				<th>Cantidad</th>
			</tr>
		</thead>
		<?php foreach($trago->getArrProductoTrago() as $ingredientes) :?>
			<tbody align="center">
					<td><?php echo $ingredientes->getIdProductoTrago();?></td>
					<td><?php echo $ingredientes->producto->getNombre();?></td>
					<td><?php echo $ingredientes->getCantidad();?></td>	
			</tbody>			
		<?php endforeach ?>

	</table>
	<a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
*/?>