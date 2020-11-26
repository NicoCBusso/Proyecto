<?php
require_once "../../class/Producto.php";

$listadoProducto = Producto::obtenerTodos();
//highlight_string(var_export($listadoProducto,true));
//exit;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Productos</title>
</head>
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
                    <h2>Lista de Productos</h2>
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
                        <div class="col-md-12 col-sm-12  ">
                        <div class="x_content">
                          <p class="text-muted font-13 m-b-30">
                            <a href="alta.php" role="button" class="btn btn-primary">Agregar</a>
                          </p>
                          <p>Productos registrados hasta el momento en el sistema</p>

                          <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr class="headings">                            
                                  <th class="column-title">Nombre </th>
                                  <th class="column-title">Codigo de Barra </th>
                                  <th class="column-title">Contenido </th>
                                  <th class="column-title">Precio Compra </th>
                                  <th class="column-title">Precio Venta </th>
                                  <th class="column-title">Categoria </th>
                                  <th class="column-title">Sub Categoria </th>
                                  <th class="column-title">Envase </th>
                                  <th class="column-title">Marca </th>
                                  <th class="column-title">Proveedor </th>
                                  <th class="column-title">Acciones </th> 
                                </tr>
                              </thead>

                              <tbody>
                                <?php foreach ($listadoProducto as $producto): ?>
                                <tr class="even pointer">
                                  <td class=" "><?php echo $producto->getNombre(); ?></td>
                                  <td class=" "><?php echo $producto->getCodigoBarra(); ?></td>
                                  <td class=" "><?php echo $producto->getContenido(); ?> ml</td>
                                  <td class=" "><?php echo $producto->getPrecioCompra(); ?>$ </td>
                                  <td class=" "><?php echo $producto->getPrecioVenta(); ?>$ </td>
                                  <td class=" "><?php echo $producto->subcategoria->categoria->getNombre(); ?></td>
                                  <td class=" "><?php echo $producto->subcategoria->getNombre(); ?></td>
                                  <td class=" "><?php echo $producto->envase->getNombre(); ?></td>
                                  <td class=" "><?php echo $producto->proveedor->getRazonSocial(); ?></td>
                                  <td class=" "><?php echo $producto->marca->getNombre(); ?></td>
                                  <td class=" last">
                                    <a href="actualizar.php?id=<?php echo $producto->getIdProducto(); ?>" role="button" class="btn btn-primary" title="Editar">Actualizar</a>
                                      <a href="#" role="button" class="btn btn-success" id="agregarConsumicion" onclick="abrirListaStock(<?php echo $producto->getIdProducto() ?>);">Consultar Stock</a></a>
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
            <!-- Modal Lista Productos-->
            <div class="modal fade" id="id_lista_stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bebida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-striped table-sm" id="stock_puesto">
                        <thead>
                            <tr>
                              <th>Puesto</th>
                              <th>Cantidad</th>
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

  <?php require_once"../../footer.php"; ?>              
</body>
</html>

<script>
  function generarFila(puesto,cantidad) {
    var row = '<tr><td>';
    row += puesto + '</td><td>';
    row += cantidad + '</td></trim>';; 
    return row;
  }


function abrirListaStock($idProducto){
  $('#stock_puesto tbody tr').empty();
  $.ajax({
    type: 'GET',
    url: '../../utils/stock/consultarStock.php',
    data: {
      'idProducto': $idProducto        
    },
    success: function(data){
      var datos = JSON.parse(data);
      
      for (var x=0; x < datos.length; x++){
        console.log(datos[x]);
        row = generarFila(
          datos[x].puesto._lugar,
          datos[x]._stockActual
          );
        $('#stock_puesto tr:last').after(row)   
      }
    }
  })
  $('#id_lista_stock').modal('show');
}



  

</script>