<?php
include_once 'Api.php';

$api = new Api();

if(isset($_POST['id']) && isset($_POST['fecha'])){

    $api->updateProductoByFecha($_POST['id'], $_POST['fecha']);
    
}

?>