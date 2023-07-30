<?php 

require_once(__DIR__.'/../models/bd.php');
require_once('api.php');
require_once('cors.php');

//obteniendo el metodo http
$method = $_SERVER['REQUEST_METHOD'];

if( $method == "POST" ){
    if($_POST['validar'] == "crearAv"){
        $api = new API();
        $rpta = $api->crearAv($_POST['nombre']);
        echo $rpta;
    }
    if($_POST['validar'] == "subirFondo"){
        $api = new API();
        $rpta = $api->subirFondo($_FILES['background']);
        echo $rpta;
    }
}

if( $method == "GET" ){

}

if( $method == "PUT" ){
    
}

if( $method == "DELETE" ){
    
}

?>