<?php
require_once '../../class/Producto.php';
require_once '../../class/Envase.php';
require_once '../../class/Marca.php';
require_once '../../class/SubCategoria.php';
require_once '../../class/Proveedor.php';
$listadoProveedor = Proveedor::obtenerTodos();
$listadoProducto = Producto::obtenerTodos();
$listadoEnvase = Envase::obtenerTodos();
$listadoMarca = Marca::obtenerTodos();
$listadoCategoria = Categoria::obtenerTodos();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <script src="../../js/validaciones/validarAumento.js"></script>
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
              <h2>Aumento de Productos</h2>
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
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="categoria">Proveedor <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="cboProveedor" id="cboProveedor" class="form-control">
                          <option value="0">Seleccionar</option>
                          <?php foreach ($listadoProveedor as $proveedor): ?>
                            <option value="<?php echo $proveedor->getIdProveedor();?>"><?php echo $proveedor->getRazonSocial()?></option>
                          <?php endforeach ?> 
                        </select>
                      </div>
                    </div>                      
                      <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="marca">Marca <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="cboMarca" id="cboMarca" class="form-control">
                          <option value="0">Seleccionar</option>
                          <?php foreach ($listadoMarca as $marca): ?>
                            <option value="<?php echo $marca->getIdMarca();?>"><?php echo $marca->getNombre()?></option>
                          <?php endforeach ?>   
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="categoria">Categoria <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="cboCategoria" id="cboCategoria" onchange="cargarSubCategoria();" class="form-control">
                          <option value="0">Seleccionar</option>
                          <?php foreach ($listadoCategoria as $categoria): ?>
                            <option value="<?php echo $categoria->getIdCategoria();?>"><?php echo $categoria->getNombre()?></option>
                          <?php endforeach ?> 
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="subCategoria">SubCategoria <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="cboSubCategoria" id="cboSubCategoria" class="form-control">
                          <option value="0">Seleccionar</option>                          
                        </select>
                      </div>
                    </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Porcentaje de aumento<span class="required"></span>
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
    let idMarca = $('#cboMarca').val();
    let idCategoria = $('#cboCategoria').val();
    let idSubCategoria = $('#cboSubCategoria').val();
    let idProveedor = $('#cboProveedor').val();
    let aumento = $('#txtPorcentaje').val();
    console.log (aumento);
    if(validar() != 1){
      $.ajax({
          type: 'GET',
          url : 'procesar/insertProducto.php',
          data: {
              'idMarca': idMarca,
              'idCategoria': idCategoria,
              'idSubCategoria': idSubCategoria,
              'idProveedor': idProveedor,
              'aumento': aumento
          },
          success: function(data){
            var datos = JSON.parse(data);
            console.log(datos);
            $('#tablaInforme tbody tr').empty();
            for (var x=0; x < datos.length; x++){
              //console.log(datos[x]);
               row = generarFila(
                datos[x].descripcion,
                datos[x].precio_venta
              );              
              $('#tablaInforme tbody tr:last').after(row);
            }
        }
      })
    }
  }

  function generarFila(nombre,precio) {
    var row = '<tr><td>';
    row += nombre + '</td><td>$ ';
    row += precio + '</td></trim>';; 
    return row;
  }
</script>
<?php require_once"../../footer.php"; ?>              
</body>
</html>