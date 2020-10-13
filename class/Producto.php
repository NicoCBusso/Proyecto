<?php
require_once 'Envase.php';
require_once 'Marca.php';
require_once 'MySQL.php';
require_once 'SubCategoria.php';
require_once 'ProductoFinal.php';

class Producto extends ProductoFinal{
    public $_idProducto;
    public $_codigoBarra;
    public $_contenido;
    public $_precioCompra;
    public $_idSubCategoria;
    public $_idEnvase;
    public $_idMarca;

    public $marca;
    public $envase;
    public $subcategoria;


    public function guardar(){
    	parent::guardar();
    	$sql = "INSERT INTO producto (id_producto,id_subcategoria,codigo_barra,contenido,precio_compra,id_producto_final,id_marca,id_envase) VALUES (NULL,$this->_idSubCategoria,$this->_codigoBarra,$this->_contenido,'$this->_precioCompra',$this->_idProductoFinal,$this->_idMarca,$this->_idEnvase)";
    	$mysql = new MySQL();
    	$idInsertado = $mysql->insertar($sql);

    	$this->_idProducto= $idInsertado;
        var_dump($sql);
        echo "insertado";    	
    }

    public function actualizar(){
        parent::actualizar();
    	$sql="UPDATE producto SET id_subcategoria = $this->_idSubCategoria, codigo_barra = $this->_codigoBarra, contenido=$this->_contenido, precio_compra=$this->_precioCompra, id_marca=$this->_idMarca, id_envase= $this->_idEnvase WHERE id_producto = $this->_idProducto";
        var_dump($sql);
        $mysql = new MySQL();
        $mysql->actualizar($sql);    	
    }
    public static function obtenerTodos()
    {
        $sql="SELECT *  FROM producto INNER JOIN productofinal ON producto.id_producto_final = productofinal.id_producto_final";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProducto($datos);

        return $listado;
    }

    public static function buscarPorDescripcion($descripcion){
        $sql = "SELECT * FROM producto INNER JOIN productofinal ON producto.id_producto_final = productofinal.id_producto_final WHERE descripcion LIKE '%".$descripcion."%'";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProductoFinal($datos);

        return $listado;
    }    

    public function _generarListadoProducto($datos){
    	$listado = array();
    	while ($registro =$datos->fetch_assoc()) {
            $producto = self::_generarProducto($registro);
	    	$listado[] = $producto;
    	}
    	return $listado;
    }

    public static function obtenerPorId($id){
    	$sql = "SELECT * FROM producto INNER JOIN productofinal ON producto.id_producto_final = productofinal.id_producto_final WHERE producto.id_producto =" . $id;
    	$mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $producto= self::_generarProducto($registro);
        return $producto;
    }

    public function _generarProducto($registro){
    	$producto = new Producto($registro['descripcion']);
    	$producto->_idProductoFinal = $registro['id_producto_final'];
        $producto->_idProducto = $registro['id_producto'];
    	$producto->_codigoBarra = $registro['codigo_barra'];
    	$producto->_contenido = $registro['contenido'];
        $producto->_precioVenta = $registro['precio_venta'];
        $producto->_precioCompra = $registro['precio_compra'];
    	$producto->_idSubCategoria = $registro['id_subcategoria'];
        $producto->setSubCategoria();
    	$producto->_idEnvase = $registro['id_envase'];
        $producto->setEnvase();
    	$producto->_idMarca = $registro['id_marca'];
        $producto->setMarca();
        $producto->stock = Stock::obtenerParaSolicitud($producto->_idProducto);

    	return $producto;
    }
    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->_idProducto;
    }

    /**
     * @param mixed $_idProducto
     *
     * @return self
     */

    /**
     * @return mixed
     */
    public function getCodigoBarra()
    {
        return $this->_codigoBarra;
    }

    /**
     * @param mixed $_codigoBarra
     *
     * @return self
     */
    public function setCodigoBarra($_codigoBarra)
    {
        $this->_codigoBarra = $_codigoBarra;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContenido()
    {
        return $this->_contenido;
    }

    /**
     * @param mixed $_contenido
     *
     * @return self
     */
    public function setContenido($_contenido)
    {
        $this->_contenido = $_contenido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecioCompra()
    {
        return $this->_precioCompra;
    }

    /**
     * @param mixed $_precioCompra
     *
     * @return self
     */
    public function setPrecioCompra($_precioCompra)
    {
        $this->_precioCompra = $_precioCompra;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdSubCategoria()
    {
        return $this->_idSubCategoria;
    }

    /**
     * @param mixed $_idSubCategoria
     *
     * @return self
     */
    public function setIdSubCategoria($_idSubCategoria)
    {
        $this->_idSubCategoria = $_idSubCategoria;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdEnvase()
    {
        return $this->_idEnvase;
    }

    /**
     * @param mixed $_envase
     *
     * @return self
     */
    public function setIdEnvase($_envase)
    {
        $this->_idEnvase = $_envase;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdMarca()
    {
        return $this->_idMarca;
    }

    /**
     * @param mixed $_marca
     *
     * @return self
     */
    public function setIdMarca($_marca)
    {
        $this->_idMarca = $_marca;

        return $this;
    }
    public function setMarca() {
        $this->marca = Marca::obtenerPorIdProducto($this->_idProducto);
    }
    public function setEnvase() {
        $this->envase = Envase::obtenerPorIdProducto($this->_idProducto);
    }
    public function setSubCategoria() {
        $this->subcategoria = SubCategoria::obtenerPorIdProducto($this->_idProducto);
    }

}