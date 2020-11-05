<?php
require_once "../../class/ProductoFinal.php";
require_once "../../class/Usuario.php";

$listadoProductoFinal = ProductoFinal::obtenerTodos();
$listadoUsuario = Usuario::obtenerTodos();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
              <h2>Ventas por Fechas</h2>
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
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">                      
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Fecha Desde</label>
                              <input type='date' name='txtFechaDesde' class="form-control" id="txtFechaDesde">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Fecha Hasta</label>  
                              <input type='date' name='txtFechaHasta' class="form-control" id="txtFechaHasta">
                          </div>
                      </div>

                      <div class="col-md-4">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="envase">Producto/Trago <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="cboProductoFinal" id="cboIdProductoFinal" class="form-control">
                            <option value="0">Seleccionar</option>
                            <?php foreach ($listadoProductoFinal as $productoFinal): ?>
                              <option value="<?php echo $productoFinal->getIdProductoFinal();?>"><?php echo $productoFinal->getNombre()?></option>
                            <?php endforeach ?>   
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Ordenar Por <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="cboTipoDeOrden" id="cboTipoDeOrden" class="form-control">
                            <option value="total">Total vendido</option>
                            <option value="cantidad">Cantidad vendida</option>   
                          </select>
                        </div>
                      </div>
                      
                    </div>
                    <p><button onclick="buscar()" class="btn btn-info">Buscar</button></p>
                    <table id="tablaInforme" class="table" style="width:100%">  
                      <thead>
                        <tr>                          
                          <th>Producto Final</th>                          
                          <th>Cantidad</th>
                          <th>Total Vendido</th>                          
                        </tr>
                      </thead>
                      <tbody id="id_busqueda">
                        <tr>                           
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
<script>
  function buscar(){
    let fechaDesde = $('#txtFechaDesde').val();
    let fechaHasta = $('#txtFechaHasta').val();
    let idProductoFinal = $('#cboIdProductoFinal').val();
    let tipoDeOrden = $('#cboTipoDeOrden').val(); 
    //console.log(idProductoFinal);
    $.ajax({
        type: 'GET',
        url : '../../utils/venta/buscarPorCantidad.php',
        data: {
            'fechaDesde': fechaDesde,
            'fechaHasta': fechaHasta,
            'idProductoFinal': idProductoFinal,
            'tipoDeOrden': tipoDeOrden
        },
        success: function(data){
            var datos = JSON.parse(data);
            console.log(datos);
            $('#tablaInforme tbody tr').empty();
            if (datos.length != null){
            for (var x=0; x < datos.length; x++){
              console.log(datos[x]);
                if (idProductoFinal != 0){        
                  if (datos[x].id_producto_final = idProductoFinal){
                    row = generarFila(
                      datos[x].descripcion,
                      datos[x].cantidad,
                      datos[x].total
                    );
                  }                 
                } else {
                  row = generarFila(
                    datos[x].descripcion,
                    datos[x].cantidad,
                    datos[x].total
                  );
                }              
            $('#tablaInforme tbody tr:last').after(row);
          }
        }
      }
    })
  }

  function generarFila(nombre,cantidad,precio) {
    var row = '<tr><td>';
    row += nombre + '</td><td>';
    row += cantidad + '</td><td>';
    row += '$'+ precio + '</td></trim>';; 
    return row;
  }
</script>
<?php require_once"../../footer.php"; ?>              
</body>
</html>