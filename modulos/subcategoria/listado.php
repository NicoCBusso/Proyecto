<?php
require_once "../../class/SubCategoria.php";
$idCategoria = $_GET['id'];
$listadoSubCategoria = SubCategoria::obtenerPorIdCategoria($idCategoria);
//highlight_string(var_export($listadoSubCategoria,true));
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

  <body class="nav-md">
  <?php require_once"../../menu.php"; ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de SubCategorias <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
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
                      <a href="alta.php?id=<?php echo $idCategoria; ?>" role="button" class="btn btn-primary">Agregar</a>
                    </p>
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">                            
                          <th class="column-title">Nombre</th>
                          <th class="column-title">Acciones</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listadoSubCategoria as $subcategoria): ?>
                        <tr class="even pointer">
                          <td class=" "><?php echo $subcategoria->getNombre();?></td> 
                          <td class=" last">
                            <a href="actualizar.php?id=<?php echo $subcategoria->getIdSubCategoria(); ?>&idCategoria=<?php echo $idCategoria;?>" role="button" class="btn btn-primary" title="Editar">Actualizar</a>                          
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                    <a href="../categoria/listado.php" role="button" class="btn btn-primary">Atras</a>
                  </div>
                </div>
              </div>
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
	<p align="center"><?php require_once"../../menu.php"; ?></p>
	<a href="alta.php?id=<?php echo $idCategoria; ?>"  role="button">Agregar</a>
	<table align="center" border="1 " width="50% ">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<?php foreach ($listadoSubCategoria as $subcategoria): ?>
			<tbody align="center">
				<tr>
					<td><?php echo $subcategoria->getNombre(); ?></td>
					<td><a href="actualizar.php?id=<?php echo $subcategoria->getIdSubCategoria(); ?>&idCategoria=<?php echo $idCategoria;?>" role="button" title="Editar">Actualizar</a>
					</td>
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>
	<a href="../categoria/listado.php"  role="button">Atras</a> 
</body>
</html>
*/?>