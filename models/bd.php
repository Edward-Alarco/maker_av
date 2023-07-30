<?php

    class Conexion{

        public function getConexion(){

            $host = "45.132.157.52";
            $database = "u954616314_av_maker";
            $user = "u954616314_av_maker";
            $password = "uM4Piu7j:5iO";

            $db = new PDO("mysql:host=$host;dbname=$database;", $user, $password);
            // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $db->exec("SET CHARACTER SET utf8");
            return $db;
            
        }

    }

?>