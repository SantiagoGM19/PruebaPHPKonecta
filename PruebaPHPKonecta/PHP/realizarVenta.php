<?php
include_once 'Api.php';

$api = new Api();

if(isset($_POST['id']) && isset($_POST['idProducto']) &&isset($_POST['cantidad'])){
    $api->postVenta($_POST['id'], $_POST['idProducto'], intval($_POST['cantidad']));
}

?>