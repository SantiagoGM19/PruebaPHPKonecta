<?php
include_once 'Api.php';

$api = new Api();

if(isset($_POST['id']) && isset($_POST['peso'])){

    $api->updateProductoByPeso($_POST['id'], $_POST['peso']);
    
}

?>