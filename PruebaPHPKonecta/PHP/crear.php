<?php
include_once 'Api.php';

$api = new Api();

if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['referencia']) && isset($_POST['precio']) && isset($_POST['peso']) && isset($_POST['categoria']) && isset($_POST['stock']) && isset($_POST['fecha'])){
    $item = array(
        'Id' => $_POST['id'],
        'Nombre'=> $_POST['nombre'],
        'Referencia' => $_POST['referencia'],
        'Precio' => $_POST['precio'],
        'Peso' => $_POST['peso'],
        'Categoria' => $_POST['categoria'],
        'Stock' => $_POST['stock'],
        'FechaCreacion'=> $_POST['fecha']
    );
    $api->postProducto($item);
}
?>