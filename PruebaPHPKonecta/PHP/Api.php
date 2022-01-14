<?php

include_once 'Producto.php';

class Api{


    function postProducto($Producto){
        $producto = new Producto();
        $res = $producto->crearProducto($Producto);
        echo '<script>alert("Producto creado correctamente, volver a la página anterior")</script>';
    }

    function updateProductoByNombre($Id, $Nombre){
        $producto = new Producto();
        $res = $producto->editarProductoByNombre($Id, $Nombre);
        echo '<script>alert("Producto editado correctamente, volver a la página anterior")</script>';
    }

    function updateProductoByReferencia($Id, $Referencia){
        $producto = new Producto();
        $producto->editarProductoByReferencia($Id, $Referencia);
        echo '<script>alert("Producto editado correctamente, volver a la página anterior")</script>';
    }

    function updateProductoByPrecio($Id, $Precio){
        $producto = new Producto();
        $res = $producto->editarProductoByPrecio($Id, $Precio);
        echo '<script>alert("Producto editado correctamente, volver a la página anterior")</script>';
    }

    function updateProductoByPeso($Id, $Peso){
        $producto = new Producto();
        $res = $producto->editarProductoByPeso($Id, $Peso);
        echo '<script>alert("Producto editado correctamente, volver a la página anterior")</script>';
    }

    function updateProductoByCategoria($Id, $Categoria){
        $producto = new Producto();
        $res = $producto->editarProductoByCategoria($Id, $Categoria);
        echo '<script>alert("Producto editado correctamente, volver a la página anterior")</script>';
    }

    function updateProductoByStock($Id, $Stock){
        $producto = new Producto();
        $res = $producto->editarProductoByStock($Id, $Stock);
        echo '<script>alert("Producto editado correctamente, volver a la página anterior")</script>';
    }

    function updateProductoByFecha($Id, $FechaCreacion){
        $producto = new Producto();
        $res = $producto->editarProductoByFecha($Id, $FechaCreacion);
        echo '<script>alert("Producto editado correctamente, volver a la página anterior")</script>';
    }

    function deleteProducto($Id){
        $producto = new Producto();
        $res = $producto->elimiarProducto($Id);
        if($res){
            echo '<script>alert("Producto eliminado correctamente, volver a la página anterior")</script>';
        }else{
            echo '<script>alert("No se puede eliminar el producto porque ya tiene ventas registradas")</script>';
        }
    }

    function getProductos(){
        $producto = new Producto();
        $productos = array();

        $res = $producto->listarProductos();

        if($res->rowCount()){
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'referencia' => $row['referencia'],
                    'precio' => $row['precio'],
                    'peso' => $row['peso'],
                    'categoria' => $row['categoria'],
                    'stock' => $row['stock'],
                    'fechaCreacion' => $row['fechaCreacion']
                );
                array_push($productos, $item);
            }
            echo json_encode($productos);
        }else{
            echo json_encode(array('mensaje' => 'No hay productos para mostrar'));
        }
    }

    function postVenta($Id, $IdProducto, $Cantidad){
        $producto = new Producto();
        $producto->realizarVenta($Id, $IdProducto, $Cantidad);
        echo '<script>alert("Producto vendido correctamente con una cantidad de '.$Cantidad.' volver a la pagina anterir</script>';
    }

}

?>