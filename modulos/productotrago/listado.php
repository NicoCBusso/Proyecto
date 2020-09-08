<?php
require_once "../../class/ProductoTrago.php";
$idTrago = $_GET['id'];
$listadoIngrediente = ProductoTrago::obtenerPorIdTrago($idTrago);
//highlight_string(var_export($listadoIngrediente,true));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Glou Glou!</title>
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
                    <p class="text-muted font-13 m-b-30">
                      <a href="alta.php?id=<?php echo $idTrago; ?>" role="button" class="btn btn-primary">Agregar</a>
                    </p>
                    <table id="datatable" class="table" style="width:100%">
                      <thead>
                        <tr>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Opciones</th>
						</tr>
                      </thead>
                      <?php foreach ($listadoIngrediente as $ingrediente): ?>
						<tbody >
							<tr>
								<td><?php echo $ingrediente->producto->getNombre(); ?></td>
								<td> <?php echo $ingrediente->getCantidad(); ?> ml</td>
								<td>
									<a href="procesar/delete.php?id=<?php echo $ingrediente->getIdProductoTrago(); ?>&idTrago=<?php echo $idTrago;?>" role="button" title="Editar">Eliminar</a>
								</td>					
							</tr>
						</tbody>
					  <?php endforeach ?>
                    </table>
                    <a href="../trago/listado.php" class="btn btn-primary role="button">Atras</a> 
                  </div>
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

	<?php require_once"../../menu.php"; ?>
	<a href="alta.php?id=<?php echo $idTrago; ?>"  role="button">Agregar</a>
	<table align="center" border="1 " width="50% ">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<?php foreach ($listadoIngrediente as $ingrediente): ?>
			<tbody align="center">
				<tr>
					<td><?php echo $ingrediente->producto->getNombre(); ?></td>
					<td> <?php echo $ingrediente->getCantidad(); ?> ml</td>
					<td>
						<a href="actualizar.php?id=<?php echo $ingrediente->getIdProductoTrago(); ?>&idTrago=<?php echo $idTrago;?>" role="button" title="Editar">Actualizar</a>
						<a href="procesar/delete.php?id=<?php echo $ingrediente->getIdProductoTrago(); ?>&idTrago=<?php echo $idTrago;?>" role="button" title="Editar">Eliminar</a>
					</td>					
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>
	<a href="../trago/listado.php"  role="button">Atras</a> 
</body>
</html>
*/?>