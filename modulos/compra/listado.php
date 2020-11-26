<?php
require_once "../../class/Compra.php";

//$listadoCompras = Compra::obtenerTodos();
//highlight_string(var_export($listadoCompras,true));
//exit;
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
                    <h2>Lista de Compras</h2>
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

                    <table id="tablaVenta" class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">                            
                          <th class="column-title">Nro</th>
                          <th class="column-title">Cajero/a</th>
                          <th class="column-title">Fecha</th>
                          <th class="column-title">Tipo de Comprobante</th>
                          <th class="column-title">Total</th>                          
                          <th class="column-title">Acciones</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="even pointer">                          
                        </tr>
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
<script>
  $.ajax({
    type: 'GET',
      url : '../../utils/compra/listaCompra.php',
      data: {
      },
    success: function(data){
      var datos = JSON.parse(data);
      console.log(datos);
      for (var x=0; x < datos.length; x++){
            row = generarFila(
              datos[x].id_compra,
              datos[x].nombre,
              datos[x].fecha,
              datos[x].descripcion,
              datos[x].total
            );            
        $('#tablaVenta tbody tr:last').after(row);
      }
    }
  })
  function generarFila(idCompra,cajero,fecha,descripcion,total) {
    if (fechaHoraExpiracion = "undefined"){
      fechaHoraExpiracion = "";

    }
    var row = '<tr class="even pointer"><td>';
    row += idCompra + '</td><td>';
    row += cajero + '</td><td>';
    row += fecha + '</td><td>';
    row += descripcion + '</td><td>$';
    row += total + '</td>';
    row += '<td><a href="detalle.php?id=';
    row += idCompra+'';
    row += '"role="button" class="btn btn-primary" title="Editar">Detalle</a></td></trim>'; 
    return row;
  }
</script>
</html>