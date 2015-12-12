<?php
session_start();
include 'php/model/contacto.model.php';

if (isset($_REQUEST['op'])){
    $accion = $_REQUEST['op'];
    $controller = new contactoController();
    call_user_func(array($controller,$accion));
}


class contactoController
{

    private $model;

    function __construct()
    {
        $this->model = new contactoModel();  
    }

    function __call($method,$args){
        if (method_exists($this, $method) ){
            call_user_func(array($this,$method),$args);
        }else{
            header('Location: index.php');
        }
    }

    function lisConta(){
        return $this->model->lisConta();/*LLAMAS A LA FUNCION LISTAR SERVICIOS Y lo imprime en formato json*/ 
    }

}