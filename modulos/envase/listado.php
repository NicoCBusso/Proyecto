<?php
require_once "../../class/Envase.php";

$listadoEnvase = Envase::obtenerTodos();
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
                    <h2>Lista de Envases</h2>
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
                                <a href="alta.php" role="button" class="btn btn-primary">Agregar</a>
                              </p>
                              <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                  <tr class="headings">                            
                                    <th class="column-title">Nombre</th>
                                    <th class="column-title">Acciones</th>                          
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($listadoEnvase as $envase): ?>
                                  <tr class="even pointer">
                                    <td class=" "><?php echo $envase->getNombre();?></td>
                                    <td class=" last">
                                      <a href="actualizar.php?id=<?php echo $envase->getIdEnvase(); ?>" role="button" class="btn btn-primary" title="Editar">Actualizar</a>
                                    </td>
                                  </tr>
                                  <?php endforeach ?>
                                </tbody>
                              </table>
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