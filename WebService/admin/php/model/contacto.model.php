<?php
include 'php/util/util2.php';

class contactoModel {

    private $cn;

    function __construct(){
      $db_cone = new util();
      $this->cn = $db_cone->getConexion();
    }

  
    public function lisConta(){/*PARA LISTAR LOS PRODUCTOS*/ /*lisprod*/
        $res=$this->cn->prepare('call mostCertificado()');/*LLAMAMOS LA PROCEDIMIENTO*/
        $res->execute();
        return $res->fetchAll(PDO::FETCH_OBJ);//return $res->fetchAll(PDO::FETCH_OBJ);/*TE TRAE POR EL NOMBRE DE LA COLUMNA*/
    }
}
?>