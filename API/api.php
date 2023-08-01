<?php 

require_once('core.php');

class API{

    public function crearAv($nombre){

        date_default_timezone_set('America/Lima');

        $slug = $this->generateSlug($nombre);
        $fechaHoraActual = date('Y-m-d H:i:s');
        $otp = $this->generarNumeroAleatorio();
        
        $nuevaCarpeta = __DIR__.'/../AVS/'.$slug.'/';

        if (!file_exists($nuevaCarpeta)) {
            // Crear la carpeta con permisos 0777 (puedes ajustar los permisos según tus necesidades)
            mkdir($nuevaCarpeta, 0777);
        }else{
            $archivos = glob($nuevaCarpeta . '/*');
            // Eliminar los archivos dentro de la carpeta
            foreach ($archivos as $archivo) {
                if (is_file($archivo)) {
                    unlink($archivo);
                }
            }
        }

        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql1 = "INSERT INTO av (nombre, slug, otp, creacion) VALUES (:nombre, :slug, :otp, :creacion)";
        $consulta = $db->prepare($sql1);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':slug', $slug);
        $consulta->bindParam(':otp', $otp);
        $consulta->bindParam(':creacion', $fechaHoraActual);
        
        if( $consulta->execute() ){
            $sql2 = "SELECT * FROM av WHERE slug=:slug ORDER BY id DESC LIMIT 1";
            $session = $db->prepare($sql2);
            $session->bindParam(':slug', $slug);
            $session->execute();
            return $session->fetch();
        }
    }

    public function crearPagina($arr){

        $nuevaPagina = __DIR__.'/../AVS/'.$arr['slug'].'/'.$arr['term'].'-'.$arr['pagina'].'/';

        // CREANDO CARPETA Y ARCHIVOS CSS
        $carpetaCSS = $nuevaPagina.'/css/';
        // -------
        $archivoCSS1 = $carpetaCSS.'style.css';
        $contArchivoCSS1 = file_get_contents(__DIR__.'/../models/AV/css/style.css');

        $archivoCSS2 = $carpetaCSS.'animate.css';
        $contArchivoCSS2 = file_get_contents(__DIR__.'/../models/AV/css/animate.css');

        // CREANDO CARPETA MEDIA O IMGs
        $carpetaIMG = $nuevaPagina.'/media/';

        // CREANDO CARPETA Y ARCHIVOS JS
        $carpetaJS = $nuevaPagina.'/js/';
        // -------
        $archivoJS1 = $carpetaJS.'app.js';
        $contArchivoJS1 = file_get_contents(__DIR__.'/../models/AV/js/app.js');

        $archivoJS2 = $carpetaJS.'contr.js';
        $contArchivoJS2 = file_get_contents(__DIR__.'/../models/AV/js/contr.js');

        $archivoJS3 = $carpetaJS.'controller.js';
        $contArchivoJS3 = file_get_contents(__DIR__.'/../models/AV/js/controller.js');

        
        $conexion = new Conexion();
        $db = $conexion->getConexion();

        if (!file_exists($nuevaPagina)) {
            // Crear la carpeta con permisos 0777 (puedes ajustar los permisos según tus necesidades)
            if(mkdir($nuevaPagina, 0777)){
                
                if(mkdir($carpetaCSS, 0777)){
                    file_put_contents($archivoCSS1, $contArchivoCSS1);
                    file_put_contents($archivoCSS2, $contArchivoCSS2);
                }
                
                mkdir($carpetaIMG, 0777);
                
                if(mkdir($carpetaJS, 0777)){
                    file_put_contents($archivoJS1, $contArchivoJS1);
                    file_put_contents($archivoJS2, $contArchivoJS2);
                    file_put_contents($archivoJS3, $contArchivoJS3);
                }

            }

            $sql = "INSERT INTO pages (id_av, pagina) VALUES (:id_av, :pagina)";
            $consulta = $db->prepare($sql);
            $consulta->bindParam(':id_av', $arr['id_av']);
            $consulta->bindParam(':pagina', $arr['pagina']);
            return $consulta->execute() ? true : false;

        }else{
            $archivos = glob($nuevaPagina . '/*');
            // Eliminar los archivos dentro de la carpeta
            foreach ($archivos as $archivo) {
                if (is_file($archivo)) {
                    unlink($archivo);
                }
            }
        }
        
    }

    public function generateSlug($text) {
        // Reemplazar caracteres especiales y espacios por guiones
        $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $text), '-'));
        // Eliminar posibles guiones al inicio o al final
        $slug = trim($slug, '-');
        return $slug;
    }    

    public function generarNumeroAleatorio() {
        // Generar un número aleatorio entre 100000 y 999999 (ambos inclusive)
        $numeroAleatorio = rand(100000, 999999);
        return $numeroAleatorio;
    }

    // ----------------------------------------

    public function uploadImage($arr, $imagen){

        $carpeta = __DIR__.'/../AVS/'.$arr['slug'].'/'.$arr['term'].'-'.$arr['pagina'].'/';
        $ruta = url_frontEnd().'AVS/'.$arr['slug'].'/'.$arr['term'].'-'.$arr['pagina'].'/';

        //$nombreArchivo = $imagen["imagen"]["name"];
        $tipoArchivo = $imagen["imagen"]["type"];
        $tipoArchivo = $tipoArchivo == 'image/png' ? '.png' : '.jpg';
        $rutaTemporal = $imagen["imagen"]["tmp_name"];
        //$tamanioArchivo = $imagen["imagen"]["size"];
        $error = $imagen["imagen"]["error"];

        $nuevoNombre = '';
        
        if($arr['validar'] == 'uploadBackground'){ //fondo
            $nuevoNombre = 'fondo'.$tipoArchivo;
            $carpeta = $carpeta.'media/';
            $ruta = $ruta.'media/';
        }elseif($arr['validar'] == 'uploadThumb'){ //thumb
            $nuevoNombre = $arr['term'].'-'.$arr['pagina'].'-thumb'.$tipoArchivo;
        }elseif($arr['validar'] == 'uploadFull'){ //full
            $nuevoNombre = $arr['term'].'-'.$arr['pagina'].'-full'.$tipoArchivo;
        }else{ //fondo - default
            $nuevoNombre = 'fondo'.$tipoArchivo;
            $carpeta = $carpeta.'media/';
        }

        if($error === UPLOAD_ERR_OK){
            if(getimagesize($rutaTemporal)){

                $conexion = new Conexion();
                $db = $conexion->getConexion();

                if( move_uploaded_file($rutaTemporal, $carpeta.$nuevoNombre) ){

                    $background = $ruta.$nuevoNombre;

                    $sql = "UPDATE pages SET background=:background WHERE id_av=:id_av AND pagina=:pagina";
                    $consulta = $db->prepare($sql);
                    $consulta->bindParam(':background', $background);
                    $consulta->bindParam(':id_av', $arr['id_av']);
                    $consulta->bindParam(':pagina', $arr['pagina']);
                    return $consulta->execute() ? $background : '';

                }


            }
        }

    }

}


?>