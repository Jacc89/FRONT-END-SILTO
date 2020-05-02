<?php

class Paginas extends controller{
    public function __construct(){
        // echo 'controlador paginas cargando';

    }

    public function index(){
        $datos = ['titulo' => 'Bienvenidos a Silto'];
        $this->view('paginas/inicio', $datos);


    }

    public function articulo($num){

        echo $num;

    }

}

?>
