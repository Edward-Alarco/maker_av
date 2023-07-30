<?php

    class Conexion{

        public static function conectar(){

            $link = new PDO("mysql:host=45.132.157.52;dbname=u954616314_av_maker", "u954616314_av_maker", "uM4Piu7j:5iO", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $link->exec("SET CHARACTER SET utf8");
            return $link;
            
        }

    }

?>