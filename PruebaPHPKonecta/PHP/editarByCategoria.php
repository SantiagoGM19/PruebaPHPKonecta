<?php
include_once 'Api.php';

$api = new Api();

if(isset($_POST['id']) && isset($_POST['categoria'])){

    $api->updateProductoByCategoria($_POST['id'], $_POST['categoria']);
    
}

?>