<?php
include_once 'Api.php';

$api = new Api();

if(isset($_POST['id'])){
    $api->deleteProducto($_POST['id']);
}

?>