<?php
session_start();
include '../model/vistaCliente.model.php';

if (isset($_REQUEST['op'])){
    $accion = $_REQUEST['op'];
    $controller = new clienteController();
    call_user_func(array($controller,$accion));
}


class clienteController
{

    private $model;

    function __construct()
    {
        $this->model = new clienteModel();  
    }

    function __call($method,$args){
        if (method_exists($this, $method) ){
            call_user_func(array($this,$method),$args);
        }else{
            header('Location: index.php');
        }
    }

    function listar(){
        echo json_encode($this->model->lisCliente());/*LLAMAS A LA FUNCION LISTAR SERVICIOS Y lo imprime en formato json*/ 
    }

    function eliminar(){
        $id = $_REQUEST['id'];
        $this->model->elimCliente($id);/*LLAMAS A LA FUNCION PARA ELIMINAR*/
        //unlink("../../../img/productos/".$id.'.jpg');
        echo json_encode("OK");
    }

    function editar(){
        $img = @$_FILES['img']['name'];
        $ext = pathinfo($img);

        $data = array();
        $data[] = $_REQUEST['cod'];
        $data[] = $_REQUEST['dni'];/*PRIMERO ENVIAS LOS PARAMETROS QUE NECESITE LA FUNCION QUE VAS A LLAMAR*/
        $data[] = @$ext['extension'];
        $data[] = $_REQUEST['nom'];
        $data[] = $_REQUEST['pater'];
        $data[] = $_REQUEST['mater'];
        $data[] = $_REQUEST['tel'];
        $data[] = $_REQUEST['mail'];
        $data[] = $_REQUEST['dire'];
        $data[] = $_REQUEST['tip'];
        $data[] = $_REQUEST['marc'];
        $data[] = $_REQUEST['mod'];
        $data[] = $_REQUEST['pla'];

        $id = $this->model->editaCliente($data);/*LLAMAS A LA FUNCION PARA INSERTAR Y ENVIAS LO PARAMETROS*/

        if ($img != ''){
            $ruta="../../../img/cliente/";
            $image=@$_FILES['img']['tmp_name'];
            move_uploaded_file($image, $ruta . "/" . $id[0]->img);
        }
        echo json_encode('OK');
    }

    function insertar(){
        $img = @$_FILES['img']['name'];
        $ext = pathinfo($img);
        
        $data = array();
        $data[] = $_REQUEST['dni'];/*PRIMERO ENVIAS LOS PARAMETROS QUE NECESITE LA FUNCION QUE VAS A LLAMAR*/
        $data[] = @$ext['extension'];
        $data[] = $_REQUEST['nom'];
        $data[] = $_REQUEST['pater'];
        $data[] = $_REQUEST['mater'];
        $data[] = $_REQUEST['tel'];
        $data[] = $_REQUEST['mail'];
        $data[] = $_REQUEST['dire'];
        $data[] = $_REQUEST['tip'];
        $data[] = $_REQUEST['marc'];
        $data[] = $_REQUEST['mod'];
        $data[] = $_REQUEST['pla'];

        

        $name = $this->model->insertCliente($data);/*LLAMAS A LA FUNCION PARA INSERTAR Y ENVIAS LO PARAMETROS*/
        $ruta="../../../img/cliente/";
        $image=@$_FILES['img']['tmp_name'];
        move_uploaded_file($image, $ruta . "/" . $name[0]->img);
        echo json_encode('OK');
    }
}