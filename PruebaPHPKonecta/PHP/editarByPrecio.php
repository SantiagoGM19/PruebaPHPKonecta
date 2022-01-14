<?php
include_once 'Api.php';

$api = new Api();

if(isset($_POST['id']) && isset($_POST['precio'])){

    $api->updateProductoByPrecio($_POST['id'], $_POST['precio']);
    
}

?>