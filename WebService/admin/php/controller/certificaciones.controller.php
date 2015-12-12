<?php
session_start();
include '../model/certificaciones.model.php';

if (isset($_REQUEST['op'])){
    $accion = $_REQUEST['op'];
    $controller = new certificacionesController();
    call_user_func(array($controller,$accion));
}


class certificacionesController
{

    private $model;

    function __construct()
    {
        $this->model = new certificacionesModel();  
    }

    function __call($method,$args){
        if (method_exists($this, $method) ){
            call_user_func(array($this,$method),$args);
        }else{
            header('Location: index.php');
        }
    }

    function listar(){
        echo json_encode($this->model->listaCertificaciones());/*LLAMAS A LA FUNCION LISTAR SERVICIOS Y lo imprime en formato json*/ 
    }

    // function eliminar(){
    //     $id = $_REQUEST['id'];
    //     $this->model->elimCliente($id);        
    //     echo json_encode("OK");
    // }

    // function editar(){
    //     $img = @$_FILES['img']['name'];
    //     $ext = pathinfo($img);

    //     $data = array();
    //     $data[] = $_REQUEST['cod'];
    //     $data[] = $_REQUEST['dni'];
    //     $data[] = @$ext['extension'];
    //     $data[] = $_REQUEST['nom'];
    //     $data[] = $_REQUEST['pater'];
    //     $data[] = $_REQUEST['mater'];
    //     $data[] = $_REQUEST['tel'];
    //     $data[] = $_REQUEST['mail'];
    //     $data[] = $_REQUEST['dire'];
    //     $data[] = $_REQUEST['tip'];
    //     $data[] = $_REQUEST['marc'];
    //     $data[] = $_REQUEST['mod'];
    //     $data[] = $_REQUEST['pla'];

    //     $id = $this->model->editaCliente($data);

    //     if ($img != ''){
    //         $ruta="../../../img/cliente/";
    //         $image=@$_FILES['img']['tmp_name'];
    //         move_uploaded_file($image, $ruta . "/" . $id[0]->img);
    //     }
    //     echo json_encode('OK');
    // }

    // function insertar(){
    //     $img = @$_FILES['img']['name'];
    //     $ext = pathinfo($img);
        
    //     $data = array();
    //     $data[] = $_REQUEST['dni'];
    //     $data[] = @$ext['extension'];
    //     $data[] = $_REQUEST['nom'];
    //     $data[] = $_REQUEST['pater'];
    //     $data[] = $_REQUEST['mater'];
    //     $data[] = $_REQUEST['tel'];
    //     $data[] = $_REQUEST['mail'];
    //     $data[] = $_REQUEST['dire'];
    //     $data[] = $_REQUEST['tip'];
    //     $data[] = $_REQUEST['marc'];
    //     $data[] = $_REQUEST['mod'];
    //     $data[] = $_REQUEST['pla'];

    //     $name = $this->model->insertCliente($data);
    //     $ruta="../../../img/cliente/";
    //     $image=@$_FILES['img']['tmp_name'];
    //     move_uploaded_file($image, $ruta . "/" . $name[0]->img);
    //     echo json_encode('OK');
    // }
}