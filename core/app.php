<?php     

function url_frontEnd(){
    if($_SERVER['SERVER_NAME'] == 'localhost') {
        return "http://localhost/maker-app/";
    } else {
        //return "http://localhost/maker-app/";
    }
}

?>