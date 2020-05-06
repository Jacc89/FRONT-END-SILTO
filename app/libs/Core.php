<?php
    class Core{
        protected $controllerActual = 'paginas';
        protected $metodoActual = 'index';
        protected $parametros = [];

        public function __construct(){
            //print_r($this->getUrl());
            $url = $this->getUrl();
            //buscar en los controladores si el controlador existe
            if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
                //si existe se configura por controlador por defecto
               $this->controllerActual = ucwords($url[0]);
                //unset indice
                unset($url[0]);
            }
            //requerir el controlador
           require_once '../app/controllers/' .$this->controllerActual . '.php';
            $this->controllerActual = new $this->controllerActual;
            
            //chequear la segunda parte de la url que seria el metodo
            if (isset($url[1])){
                if (method_exists($this->controllerActual, $url[1])){
                    //chequemos el metodo
                    $this->metodoActual = $url[1];
                    //unset indice
                    unset($url[1]);
                }
            }
            //para probar taer metodo
            //  echo $this->metodoActual;

            //obtener los parametros
            $this->parametros = $url ? array_values($url) : [];

            //llamar el callback con los parametros array
            call_user_func_array([$this->controllerActual, $this->metodoActual], $this->parametros);
        }
        public function getUrl(){
            //
            if (isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }
?>






