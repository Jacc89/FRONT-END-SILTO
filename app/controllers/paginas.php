<?php

class Paginas extends controller{

    public function __construct(){
        // $this->articuloModel =$this->model('Articulo');
        // //echo 'controlador paginas cargando';

    }

    public function index(){
        // $articulos = $this->articuloModel->obtenerArticulos();


        $datos = [
            'titulo' => 'Bienvenidos a Silto'
            // 'articulos' => $articulos
        ];

         $this->view('paginas/inicio', $datos);


    }

}

?>
