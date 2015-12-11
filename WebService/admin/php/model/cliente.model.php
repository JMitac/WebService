<?php
include '../util/util2.php';

class clienteModel {

    private $cn;

    function __construct(){
      $db_cone = new util();
      $this->cn = $db_cone->getConexion();
    }

    public function lisCliente(){/*PARA LISTAR LOS PRODUCTOS*/ /*lisprod*/
        $res=$this->cn->prepare('call mostClie()');/*LLAMAMOS LA PROCEDIMIENTO*/
        $res->execute();
        return $res->fetchAll(PDO::FETCH_OBJ);//return $res->fetchAll(PDO::FETCH_OBJ);/*TE TRAE POR EL NOMBRE DE LA COLUMNA*/
    }

    public function elimCliente($id){/*FUNCION PARA BORRAR*//*elimicli*/
        $res=$this->cn->prepare("call borraClie(?)");/*LLAMAMOS AL PROCEDIMIENTO*//*eliminaclient*/
        $res->execute(array($id));      
    }

    public function editaCliente($data){/*PARA INSERTAR LOS PRODUCTOS*/ /*insertProd*/
        $res=$this->cn->prepare("call editaClie(?,?,?,?,?,?,?,?,?,?,?,?,?)");/*AQUI ESTOY LLAMANDO AL PROCEDIMIENTO: INSERTAR PRODUCTOS, ENVIANDO DE PARAMETROS TITU Y CUER*/       
        $res->execute($data);
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertCliente($data){/*PARA INSERTAR LOS PRODUCTOS*/ /*insertProd*/
        $res=$this->cn->prepare("call insertClie(?,?,?,?,?,?,?,?,?,?,?,?)");/*AQUI ESTOY LLAMANDO AL PROCEDIMIENTO: INSERTAR PRODUCTOS, ENVIANDO DE PARAMETROS TITU Y CUER*/
        $res->execute($data); 
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}
?>