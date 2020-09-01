<?php
require_once "../../class/Provincia.php";

$listadoProvincia = Provincia::obtenerTodos();

//highlight_string(var_export($listadoProvincia,true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado de Provincias</title>
</head>

<body>
  <p align="center"><?php require_once"../../menu.php"; ?></p>
  <a href="alta.php"  role="button">Agregar</a>
  <table align="center" border="1 " width="50% ">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>

                  	<?php foreach ($listadoProvincia as $provincia): ?>

                  	<tbody align="center">
                  
                      <tr>
							           <td> <?php echo $provincia->getDescripcion(); ?> </td>
							           <td width="50%"> 
								            <a href="actualizar.php?id=<?php echo $provincia->getIdProvincia(); ?>" role="button" title="Editar">Actualizar</a>
                            <a href="detalleProvincia.php?id=<?php echo $provincia->getIdProvincia(); ?>">Detalle</a>                            
								         </td>
			                </tr>
                    
                	</tbody>

                	<?php endforeach ?>

                </table>
  <a href="../../menu.php"  role="button">Menu</a>                
</body>
</html>
