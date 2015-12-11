<?php
session_start();
include '../model/nosotros.model.php';

    if(isset($_REQUEST['op'])){
        $op=$_REQUEST['op'];
    }else{
        header('Location: ../vista/index.php');
    };
    switch ($op){
        case 1:
          $objDAO=new dao();
            $lnosotros=$objDAO->listNos();/*LLAMAS A LA FUNCION: PARA LISTAR*/
            $_SESSION["nosotros"] = $lnosotros;/*CREAS UNA*/
            header('Location: ../../admin-nosotros.php');
            break;
        case 2:
            /*$tit = $_REQUEST['titu'];*//*PRIMERO ENVIAS LOS PARAMETROS QUE NECESITE LA FUNCION QUE VAS A LLAMAR*/            
            $cuer = $_REQUEST['cuerpo'];
            $objDAO=new dao();
            $objDAO->InserNos($cuer);/*LLAMAS A LA FUNCION PARA INSERTAR*/
            echo json_encode('OK');
        break;  
    default :
    header('Location: ../vista/index.php');
    break;
    }
?>