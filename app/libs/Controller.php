<?php

//clase de controlador principal
//Se encarga  de poder cargar los modelos y las vistas

class Controller{
    //cargar modelo
    public function model($model){
        //cargar
        require_once '../app/models/' . $model . '.php';
        //instanciar el models
        return new $model();
    }

    //cargar vista
    public function view($view, $datos = []){
        //chequear si el archivo  view existe
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            //si el archivo de la view no existe
            die('La vista no existe');
        }

    }
}


?>