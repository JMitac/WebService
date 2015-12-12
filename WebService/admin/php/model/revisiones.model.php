<?php
include '../util/util2.php';

class revisionModel {

    private $cn;

    function __construct(){
      $db_cone = new util();
      $this->cn = $db_cone->getConexion();
    }

    public function lisRevision(){/*PARA LISTAR LOS PRODUCTOS*/ /*lisprod*/
        $res=$this->cn->prepare('call mostRev()');/*LLAMAMOS LA PROCEDIMIENTO*/
        $res->execute();
        return $res->fetchAll(PDO::FETCH_OBJ);//return $res->fetchAll(PDO::FETCH_OBJ);/*TE TRAE POR EL NOMBRE DE LA COLUMNA*/
    }

    public function elimCliente($id){/*FUNCION PARA BORRAR*//*elimicli*/
        $res=$this->cn->prepare("call borraRev(?)");/*LLAMAMOS AL PROCEDIMIENTO*//*eliminaclient*/
        $res->execute(array($id));      
    }

    public function editaCliente($data){/*PARA INSERTAR LOS PRODUCTOS*/ /*insertProd*/
        $res=$this->cn->prepare("call editaServ(?,?,?,?,?,?,?,?,?)");/*AQUI ESTOY LLAMANDO AL PROCEDIMIENTO: INSERTAR PRODUCTOS, ENVIANDO DE PARAMETROS TITU Y CUER*/       
        $res->execute($data);
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertCliente($data){/*PARA INSERTAR LOS PRODUCTOS*/ /*insertProd*/
        $res=$this->cn->prepare("call insertRev(?,?,?,?,?,?,?,?,?)");/*AQUI ESTOY LLAMANDO AL PROCEDIMIENTO: INSERTAR PRODUCTOS, ENVIANDO DE PARAMETROS TITU Y CUER*/
        $res->execute($data); 
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}
?>