<?php
include '../util/util2.php';

class certificacionesModel {

    private $cn;

    function __construct(){
      $db_cone = new util();
      $this->cn = $db_cone->getConexion();
    }

    public function listaCertificaciones(){/*PARA LISTAR LOS PRODUCTOS*/ /*lisprod*/
        $res=$this->cn->prepare('call mostCertificado()');/*LLAMAMOS LA PROCEDIMIENTO*/
        $res->execute();
        return $res->fetchAll(PDO::FETCH_OBJ);//return $res->fetchAll(PDO::FETCH_OBJ);/*TE TRAE POR EL NOMBRE DE LA COLUMNA*/
    }

    // public function elimCliente($id){
    //     $res=$this->cn->prepare("call borraClie(?)");
    //     $res->execute(array($id));      
    // }

    // public function editaCliente($data){
    //     $res=$this->cn->prepare("call editaClie(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    //     $res->execute($data);
    //     return $res->fetchAll(PDO::FETCH_OBJ);
    // }

    // public function insertCliente($data){
    //     $res=$this->cn->prepare("call insertClie(?,?,?,?,?,?,?,?,?,?,?,?)");
    //     $res->execute($data); 
    //     return $res->fetchAll(PDO::FETCH_OBJ);
    // }
}
?>