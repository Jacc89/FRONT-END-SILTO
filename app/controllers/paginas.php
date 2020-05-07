<?php

class Paginas extends controller{

    public function __construct(){
        // $this->articuloModel =$this->model('Articulo');
        // //echo 'controlador paginas cargando';
        $this->usuarioModel =$this->model('Usuario');
    }

    public function index(){

        //obtener los usuarios
        $usuarios = $this->usuarioModel->obtenerUsuarios();
        //obtener articulos
        // $articulos = $this->articuloModel->obtenerArticulos();
        $datos = [
            'usuarios' => $usuarios

            // 'titulo' => 'Bienvenidos a Silto'
            // 'articulos' => $articulos
        ];
         $this->view('paginas/inicio', $datos);
    }

    public function agregar(){
        //se ejecuta la base
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'nombre'=>trim($_POST['nombre']),
                'email'=>trim($_POST['email']),
                'telefono'=>trim($_POST['telefono'])
            ];
            //si sale bn la conexion Agrega
            if($this->usuarioModel->agregarUsuario($datos)){
                redireccionar('/paginas');
               //sino sale el mensaje
            }else{
                die('algo salio mal');
            }
        }else {
            $datos = [
                'nombre' => '',
                'email' => '',
                'telefono' => ''
            ];
            $this->view('/paginas/agregar', $datos);
        }
    }

    public function editar($id){
        //se ejecuta la base

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'id_usuario'=> $id,
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono'])
            ];
            //si sale bn la conexion Agrega
            if($this->usuarioModel->actualizarUsuario($datos)){
                redireccionar('/paginas');
               //sino sale el mensaje
            }else{
                die('algo salio mal');
            }
        }else {
            //obtener informaion de usuario desde modelo
            $usuarios =$this->usuarioModel->obtenerUsuarioId($id);
            $datos = [
                'id_usuario'=>$usuarios->id_usuario,
                'nombre'=>$usuarios->nombre,
                'email'=>$usuarios->email,
                'telefono'=>$usuarios->telefono
            ];
            $this->view('/paginas/editar', $datos);
        }
    }

    public function borrar($id){
        //obtener informaion de usuario desde modelo
        $usuarios =$this->usuarioModel->obtenerUsuarioId($id);
        $datos = [
            'id_usuario'=>$usuarios->id_usuario,
            'nombre'=>$usuarios->nombre,
            'email'=>$usuarios->email,
            'telefono'=>$usuarios->telefono
        ];
        //se ejecuta la base
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'id_usuario'=> $id
            ];
            //si sale bn la conexion Agrega
            if($this->usuarioModel->borrarUsuario($datos)){
                redireccionar('/paginas');
               //sino sale el mensaje
            }else{
                die('algo salio mal');
            }
        }
        $this->view('/paginas/borrar', $datos);
    }

}

?>
