<?php 

require_once(__DIR__.'/../models/bd.php');
require_once('api.php');
require_once('core.php');
require_once('cors.php');

//obteniendo el metodo http
$method = $_SERVER['REQUEST_METHOD'];

if( $method == "POST" ){
    if($_POST['validar'] == "crearAv"){
        $api = new API();
        $rpta = $api->crearAv($_POST['nombre']);
        echo json_encode($rpta);
    }
    if($_POST['validar'] == "crearPagina"){
        $api = new API();
        $rpta = $api->crearPagina($_POST);
        echo $rpta;
    }

    if($_POST['validar'] == "uploadBackground"){
        $api = new API();
        $rpta = $api->uploadImage($_POST, $_FILES);
        echo json_encode($rpta);
    }
    if($_POST['validar'] == "uploadThumb"){
        $api = new API();
        $rpta = $api->uploadImage($_POST, $_FILES);
        echo json_encode($rpta);
    }
    if($_POST['validar'] == "uploadFull"){
        $api = new API();
        $rpta = $api->uploadImage($_POST, $_FILES);
        echo json_encode($rpta);
    }

}

if( $method == "GET" ){

}

if( $method == "PUT" ){
    
}

if( $method == "DELETE" ){
    
}

?>