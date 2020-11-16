<?php
require_once '../../class/Trago.php';
$listadoProducto = Producto::obtenerProductoQueSonTrago();
//highlight_string(var_export($listadoProducto,true));
//exit;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <script type="text/javascript" src="../../js/functions/producto/functions.js" ></script>
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
              <h2>Aumento de Tragos</h2>
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
                      <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="categoria">Trago que contenga de ingrediente <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="cboProducto" id="cboProducto" class="form-control">
                          <option value="0">Seleccionar</option>
                          <?php foreach ($listadoProducto as $producto): ?>
                            <option value="<?php echo $producto->getIdProducto();?>"><?php echo $producto->getNombre()?></option>
                          <?php endforeach ?> 
                        </select>
                      </div>
                    </div>
                    
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Porcentaje de aumento<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="numeric" id="txtPorcentaje" required="required" class="form-control" name="txtPorcentaje" >
                        </div>
                      </div>

                    <p><button onclick="buscar()" class="btn btn-info">Aumentar</button></p>
                    <table id="tablaInforme" class="table" style="width:100%">  
                      <thead>
                        <tr>                          
                          <th>Producto</th>                          
                          <th>Precio Nuevo</th>                         
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
    let idProducto = $('#cboProducto').val();
    let aumento = $('#txtPorcentaje').val();
    console.log (aumento);
    $.ajax({
        type: 'GET',
        url : 'procesar/insertTrago.php',
        data: {
            'idProducto': idProducto,
            'aumento': aumento
        },
        success: function(data){
            console.log(data)
        }
    })
  }

  function generarFila(fecha,nombre,cajero,precio,estado,idProductoFinal) {
    var row = '<tr><td>';
    row += fecha + '</td><td>';
    row += nombre + '</td><td>';
    row += precio + '</td><td>';
    row += estado + '</td><td>';
    row += cajero + '</td></trim>';; 
    return row;
  }
</script>
<?php require_once"../../footer.php"; ?>              
</body>
</html>