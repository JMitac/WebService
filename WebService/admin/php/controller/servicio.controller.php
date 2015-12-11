<?php
session_start();
include '../model/servicio.model.php';

    if(isset($_REQUEST['op'])){
        $op=$_REQUEST['op'];
    }else{
        header('Location: ../vista/index.php');
    };
    switch ($op){
    case 1:
      $objDAO=new dao();
        $lclient=$objDAO->lisSer();/*LLAMAS A LA FUNCION LISTAR SERVICIOS*/
        $_SESSION["servi"] = $lclient;/*CREAS UNA*/
        header('Location: ../../admin-servicios.php');
        /*
            $variable = array();
            $i=0;
            if($lclient){
                foreach ($lclient as $row){
                    $img = '<img style="width:100px; height: 70px;" class="table-image" src="../img/servicios/'. $row[4]. '">';   
                    $accion = '<button class="btn btn btn-danger" id="Elimina" value="'. $row[0] .'" onclick="btnElimina(this)">   Eliminar</button>';
                              
                    $variable[$i][0]=$row[0];
                    $variable[$i][1]=$row[1];
                    $variable[$i][2]=substr($row[2], 0,80).'...';       AGREGADO
                    $variable[$i][3]= $img;                             CAMBIADO $variable[$i][2]= $img;
                    $variable[$i][4]= $accion;                          CAMBIADO  $variable[$i][3]= $accion;
                    $i++;
                }
            }            
        echo json_encode($variable);
        */
             
        break;

        case 2:
        //$id = $_REQUEST['id'];
           $titu = $_REQUEST['titu'];
           $cuer = $_REQUEST['cuerpo'];
           $img = @$_FILES['img']['name'];
           $objDAO=new dao();
           $objDAO->insertServ($titu,$cuer,$img);

           $ruta = "../../../img/servicios/";
            move_uploaded_file( $img = @$_FILES['img']['tmp_name'], $ruta."/".$img = @$_FILES['img']['name']);
            echo json_encode("OK");
        break;            
            
    default :
    header('Location: ../vista/index.php');
    break;
    }
?>