<?php
include_once 'Api.php';

$api = new Api();

if(isset($_POST['id']) && isset($_POST['stock'])){

    $api->updateProductoByStock($_POST['id'], $_POST['stock']);
    
}

?>