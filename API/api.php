<?php 

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
        $sql = "INSERT INTO av (nombre, slug, otp, creacion) VALUES (:nombre, :slug, :otp, :creacion)";
        $consulta = $db->prepare($sql);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':slug', $slug);
        $consulta->bindParam(':otp', $otp);
        $consulta->bindParam(':creacion', $fechaHoraActual);

        return $consulta->execute() ? $otp : '';
    }

    public function subirFondo($imagen){

        

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

}


?>