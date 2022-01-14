<?php
include_once 'Api.php';

$api = new Api();

if(isset($_POST['id']) && isset($_POST['referencia'])){

    $api->updateProductoByReferencia($_POST['id'], $_POST['referencia']);
    
}

?>