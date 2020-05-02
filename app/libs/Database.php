<?php
    //clase para conectarse a la base de datos y ejecutar consultas PDO
    class Database{
        private $host = DB_HOST;
        private $usuario = DB_USUARIO;
        private $password = DB_PASSWORD;
        private $nombre_base = DB_NOMBRE;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct(){
            //configurar conexion
            $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->nombre_base;
            $opciones = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //Crear la instancia  de PDO
            try{
                $this->dbh =new PDO($dns, $this->usuario, $this->password, $opciones);
                $this->dbh->exec('set names utf8');
            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;

            }
        }


    }


?>