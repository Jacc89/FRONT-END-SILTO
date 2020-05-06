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
//preparando la consulta a la base de datos
        public function query($sql){
            $this->stmt= $this->dbh->prepare($sql);

        }
        //vinculacion de la consulta con bind
        public function bind($parametro, $valor, $tipo =null){
            if (is_null($tipo)) {
                switch ($variable) {
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                    break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                    break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                    break;
                    default:
                       $tipo = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($parametro, $valor, $tipo);
        }
        //ejecucion de consulta
        public function execute(){
          return $this->stmt->execute();

        }
        //obtener  los registros
        public function registros(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);

        }
        //obtener un solo registro
        public function registro(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);

        }
        //obtener cantidad de filas con el modelo rowCount
        public function rowCount(){
            return $this->stmt->rowCount();

        }
    }


?>