<?php
include_once 'Api.php';

$api = new Api();

if(isset($_POST['id']) && isset($_POST['nombre'])){

    $api->updateProductoByNombre($_POST['id'], $_POST['nombre']);
}

?>