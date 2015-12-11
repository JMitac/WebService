<?php
session_start();
include '../model/mision.model.php';

    if(isset($_REQUEST['op'])){
        $op=$_REQUEST['op'];
    }else{
        header('Location: ../vista/index.php');
    };
    switch ($op){
       	case 1:
          $objDAO=new dao();
            $lnotici=$objDAO->listMisi();/*LLAMAS A LA FUNCION: PARA LISTAR*/
            $_SESSION["misvis"] = $lnotici;/*CREAS UNA*/
            header('Location: ../../admin-mision.php');
            break;
    	    
        case 2:
            /*$tit = $_REQUEST['titu'];*//*PRIMERO ENVIAS LOS PARAMETROS QUE NECESITE LA FUNCION QUE VAS A LLAMAR*/            
            $cuer = $_REQUEST['cuerpo'];
            $objDAO=new dao();
            $objDAO->nuevamisi($cuer);/*LLAMAS A LA FUNCION PARA INSERTAR*/
           

            echo json_encode('OK');
        break;  
    default :
	header('Location: ../vista/index.php');
    break;
    }
?>