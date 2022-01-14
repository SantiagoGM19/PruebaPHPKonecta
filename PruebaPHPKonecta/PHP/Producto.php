<?php
include_once 'DB.php';

class Producto extends DB{

    //date("YY-mm-DD", strtotime($FechaCreacion)

    function crearProducto($producto){

        $query = $this->conectar()->prepare('INSERT INTO productos (id, nombre, referencia, precio, peso, categoria, stock, fechaCreacion)
        values (:Id, :Nombre, :Referencia, :Precio, :Peso, :Categoria, :Stock, :FechaCreacion)');

        $query->execute(['Id' => $producto['Id'], 'Nombre' => $producto['Nombre'], 'Referencia' => $producto['Referencia'], 'Precio' => $producto['Precio'],
        'Peso' => $producto['Peso'], 'Categoria' => $producto['Categoria'], 'Stock' => $producto['Stock'], 'FechaCreacion' => $producto['FechaCreacion']]);

        return $query;
    }

    function editarProductoByNombre($Id, $Nombre){
        $query = $this->conectar()->prepare('UPDATE productos SET nombre=:Nombre WHERE id=:Id');
        $query->execute(['Id' => $Id, 'Nombre' => $Nombre]);
    }

    function editarProductoByReferencia($Id,$Referencia){
        $query = $this->conectar()->prepare('UPDATE productos SET referencia=:Referencia WHERE id=:Id');
        $query->execute(['Id' => $Id, 'Referencia' => $Referencia]);
    }

    function editarProductoByPrecio($Id,$Precio){
        $query = $this->conectar()->prepare('UPDATE productos SET precio=:Precio WHERE id=:Id');
        $query->execute(['Id' => $Id, 'Precio' => $Precio]);
    }

    function editarProductoByPeso($Id,$Peso){
        $query = $this->conectar()->prepare('UPDATE productos SET peso=:Peso WHERE id=:Id');
        $query->execute(['Id' => $Id, 'Peso' => $Peso]);
    }

    function editarProductoByCategoria($Id, $Categoria){
        $query = $this->conectar()->prepare('UPDATE productos SET categoria=:Categoria WHERE id=:Id');
        $query->execute(['Id' => $Id, 'Categoria' => $Categoria]);
    }

    function editarProductoByStock($Id,$Stock){
        $query = $this->conectar()->prepare('UPDATE productos SET stock=:Stock WHERE id=:Id');
        $query->execute(['Id' => $Id, 'Stock' => $Stock]);
    }

    function editarProductoByFecha($Id,$FechaCreacion){
        $query = $this->conectar()->prepare('UPDATE productos SET fechaCreacion=:FechaCreacion WHERE id=:Id');
        $query->execute(['Id' => $Id, 'FechaCreacion' => $FechaCreacion]);
    }

    function elimiarProducto($Id){
        $queryConfirmacion = $this->conectar()->query('SELECT * FROM ventas WHERE id_producto = '.$Id);
        if($queryConfirmacion->rowCount()){
            return false;
        }else{
            $query = $this->conectar()->prepare('DELETE FROM productos WHERE id = :Id');
            $query->execute(['Id' => $Id]);
            return true;
        }
    }

    function listarProductos(){
        $query = $this->conectar()->query('SELECT * FROM productos');
        return $query;
    }

    function realizarVenta($Id, $IdProducto, $Cantidad){
        $queryAuxiliar = $this->conectar()->prepare('SELECT stock FROM productos WHERE id = :IdProducto');
        $queryAuxiliar->execute(['IdProducto' => $IdProducto]);
        $cantidadActual = $queryAuxiliar->fetch();

        print_r($cantidadActual);
        echo $Cantidad;
        if($cantidadActual['stock'] > 0){

            $queryUpdate = $this->conectar()->prepare('UPDATE productos SET stock = :cantidadActual - :Cantidad WHERE id = :IdProducto');
            $queryUpdate->execute(['cantidadActual' => $cantidadActual['stock'], 'Cantidad' => $Cantidad, 'IdProducto' => $IdProducto]);
            $queryInsert = $this->conectar()->prepare('INSERT INTO ventas (id, id_producto, CantidadVendido) VALUES (:Id ,:IdProducto, :Cantidad)');
            $queryInsert->execute(['Id'=> $Id, 'IdProducto' => $IdProducto, 'Cantidad' => $Cantidad]);

        }else{

            echo '<script>alert("No se puede realizar la venta, el sctock es nulo")</script>';
        }
    }
    
}
?>    